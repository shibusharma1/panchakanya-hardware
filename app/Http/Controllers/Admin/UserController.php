<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\ImageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderByDesc('created_at')->paginate(10);
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        if (auth()->user()->role !== 'super_admin') {
            abort(403, 'Only super admin can create new admins.');
        }
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        if ($request->user()->role !== 'super_admin') {
            abort(403, 'Only super admin can create new admins.');
        }

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:6'],
            'phone' => ['nullable', 'string', 'max:50'],
            'avatar' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'role' => ['nullable', Rule::in(['admin', 'super_admin'])],
        ]);

        $data = $request->only(['name', 'email', 'phone']);
        $data['password'] = Hash::make($request->password);

        $role = 'admin';
        if ($request->user()->role === 'super_admin' && $request->filled('role')) {
            $role = $request->role;
        }
        $data['role'] = $role;

        // if ($request->hasFile('avatar')) {
        //     $data['avatar'] = $request->file('avatar')->store('avatars', 'public');
        // }

        if ($request->hasFile('avatar')) {
            $data['avatar'] = ImageService::upload(
                $request->file('avatar'),
                'avatars'
            );
        }

        $user = User::create($data);

        return redirect()->route('admin.users.index')->with('success', 'Admin user created successfully.');
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users', 'email')->ignore($user->id)],
            'password' => ['nullable', 'string', 'min:6'],
            'phone' => ['nullable', 'string', 'max:50'],
            'avatar' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'role' => ['nullable', Rule::in(['admin', 'super_admin'])],
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

        if ($request->user()->role === 'super_admin' && $request->filled('role')) {
            $data['role'] = $request->role;
        }

        $user->update($data);

        return redirect()->route('admin.users.index')->with('success', 'Admin user updated successfully.');
    }

    public function destroy(User $user)
    {
        if ($user->role === 'super_admin') {
            return redirect()->route('admin.users.index')->with('error', 'Cannot delete a super admin.');
        }
        if ($user->id === auth()->id()) {
            return redirect()->route('admin.users.index')->with('error', 'You cannot delete your own account.');
        }
        if (auth()->user()->role !== 'super_admin') {
            abort(403, 'Only super admin can delete admins.');
        }

        // if ($user->avatar) {
        //     Storage::disk('public')->delete($user->avatar);
        // }

        ImageService::delete($user->avatar);

        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'Admin user deleted successfully.');
    }
}
