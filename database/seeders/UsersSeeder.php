<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            [
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'password' => Hash::make('admin123'),
                'role_id' => 1,
            ],[
                'name' => 'atasan',
                'email' => 'atasan@admin.com',
                'password' => Hash::make('admin123'),
                'role_id' => 2,
            ],[
                'name' => 'marketing',
                'email' => 'marketing@admin.com',
                'password' => Hash::make('admin123'),
                'role_id' => 3,
            ],
        ]);
    }
}
