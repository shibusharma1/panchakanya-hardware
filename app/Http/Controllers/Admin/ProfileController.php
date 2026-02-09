<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\ImageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function edit()
    {
        return view('admin.profile.edit', [
            'user' => auth()->user()
        ]);
    }

    public function update(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users', 'email')->ignore($user->id)],
            'phone' => ['nullable', 'string', 'max:50'],
            'avatar' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'password' => ['nullable', 'string', 'min:6', 'confirmed'],
        ]);

        $data = $request->only(['name', 'email', 'phone']);

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        // if ($request->hasFile('avatar')) {
        //     if ($user->avatar) {
        //         Storage::disk('public')->delete($user->avatar);
        //     }
        //     $data['avatar'] = $request->file('avatar')->store('avatars', 'public');
        // }
        if ($request->hasFile('avatar')) {
            $data['avatar'] = ImageService::update(
                $request->file('avatar'),
                'avatars',
                $user->avatar  // old avatar path
            );
        }
        $user->update($data);

        return redirect()->route('admin.profile.edit')->with('success', 'Profile updated successfully.');
    }
}
