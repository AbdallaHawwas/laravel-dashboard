<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Notifications\NewAdminNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admins.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::pluck('name', 'id');

        return view('admins.create', [
            'roles' => $roles,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:admins',
            'email' => 'required|string|email|max:255|unique:admins',
            'role' => 'required|exists:roles,id',
        ]);

        $password = Str::random(8);

        $admin = Admin::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($password),
        ]);

        $admin->assignRole($validated['role']);
        $admin->notify(new NewAdminNotification($password));

        return redirect()->route('admins.index')->with('success', __('Admin has been created.'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $admin)
    {
        $roles = Role::pluck('name', 'id');

        return view('admins.edit', [
            'admin' => $admin,
            'roles' => $roles,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Admin $admin)
    {
        $validated = $request->validate([
            'role' => 'required|exists:roles,id',
        ]);

        $admin->syncRoles($validated['role']);

        return redirect()->route('admins.index')->with('success', __('Admin has been updated.'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {
        if ($admin->id === auth()->user()->id) {
            return back()->with('error', __('You cannot delete yourself.'));
        }

        $admin->delete();

        return back()->with('success', __('Admin has been deleted.'));
    }
}
