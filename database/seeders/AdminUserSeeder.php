<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'admin@panchakanya.com'],
            [
                'name' => 'Super Admin',
                'password' => Hash::make('password'),
                'role' => 'super_admin',
                'email_verified_at' => now(),
            ]
        );

        // Ensure the role is super_admin if the user already exists
        $user = User::where('email', 'admin@panchakanya.com')->first();
        if ($user && $user->role !== 'super_admin') {
            $user->update(['role' => 'super_admin']);
        }
    }
}
