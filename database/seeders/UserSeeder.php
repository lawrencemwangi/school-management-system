<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $password = Hash::make('admin_123');

        $admin_records = [
            [
                'first_name' => 'Admin',
                'last_name' => 'Administrator',
                'phone_number' => '0799509242',
                'username' => 'mwas',
                'email' => 'admin@gmail.com',
                'status' => 1,
                'user_level' => 1,
                'password' => $password
            ],
        ];

        foreach ($admin_records as $admin_record) {
            User::create($admin_record);
        }
    }
}

