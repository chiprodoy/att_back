<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::firstOrCreate(
            ['email' => 'superadmin@example.com'],
            [
                'name' => 'Super Admin',
                'password' => Hash::make('password123'),
            ]
        );

        $user->assignRole('superadmin');

        $names = [
            'Andi', 'Budi', 'Citra', 'Dewi', 'Eka', 'Ena',
            'Fajar', 'Gita', 'Hadi', 'Indah', 'Joko', 'Jaya',
        ];

        foreach ($names as $i => $name) {
            $user = User::firstOrCreate(
                ['email' => strtolower($name) . '@example.com'],
                [
                    'name' => $name,
                    'password' => Hash::make('password123'),
                ]
            );
            $user->assignRole('user');
        }
    }
}
