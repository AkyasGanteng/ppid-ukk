<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        $admins = [
            [
                'name' => 'Super Admin',
                'email' => 'admin1@ppidgarut.com',
                'password' => Hash::make('admin123'),
            ],
            [
                'name' => 'Admin Kedua',
                'email' => 'admin2@ppidgarut.com',
                'password' => Hash::make('admin456'),
            ],
            [
                'name' => 'Admin Ketiga',
                'email' => 'admin3@ppidgarut.com',
                'password' => Hash::make('admin789'),
            ],
        ];

        foreach ($admins as $admin) {
            User::updateOrCreate(
                ['email' => $admin['email']],
                [
                    'name' => $admin['name'],
                    'password' => $admin['password'],
                    'role' => 'admin',
                ]
            );
        }
    }
}
