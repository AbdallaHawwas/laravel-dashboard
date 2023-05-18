<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Traits\CanUploadFile;

class ProfileController extends Controller
{
    use CanUploadFile;

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        return view('profile.edit', [
            'user' => auth()->user(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProfileUpdateRequest $request)
    {
        $user = $request->user();
        $user->fill($request->only('name', 'email'));

        if ($request->filled('password')) {
            $user->password = bcrypt($request->get('password'));
        }

        if ($request->hasFile('profile_picture')) {
            if ($old = $user->profile_picture) {
                $this->deleteFileFromUrl($old);
            }

            $user->profile_picture = $this->uploadFile($request->file('profile_picture'), 'profile_pictures');
        }

        $user->save();

        return redirect()->route('profile.edit')->with('success', __('Profile updated successfully.'));
    }
}
