<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('roles.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = Permission::all()->groupBy(function ($item, $key) {
            return explode('.', $item->name)[0];
        });

        return view('roles.create', [
            'permissions' => $permissions,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'unique:roles,name'],
            'permissions' => ['nullable', 'array'],
            'permissions.*' => ['required', 'exists:permissions,id'],
        ]);

        $role = Role::create($validated);

        $role->syncPermissions($validated['permissions'] ?? []);

        return redirect()->route('roles.index')
            ->with('success', __('Role created successfully.'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        $permissions = Permission::all()->groupBy(function ($item, $key) {
            return explode('.', $item->name)[0];
        });

        return view('roles.edit', [
            'role' => $role,
            'permissions' => $permissions,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        $validated = $request->validate([
            'name' => ['required', 'unique:roles,name,' . $role->id],
            'permissions' => ['nullable', 'array'],
            'permissions.*' => ['required', 'exists:permissions,id'],
        ]);

        $role->update($validated);

        $role->syncPermissions($validated['permissions'] ?? []);

        return redirect()->route('roles.index')
            ->with('success', __('Role updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        if ($role->users()->count() > 0) {
            return redirect()->route('roles.index')
                ->with('error', __('Role is used by a user.'));
        }

        $role->delete();

        return redirect()->route('roles.index')
            ->with('success', __('Role deleted successfully.'));
    }
}
