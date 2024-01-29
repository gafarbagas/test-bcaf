<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::insert([
            [
                'role_name' => 'Admin',
            ],
            [
                'role_name' => 'Atasan Marketing',
            ],
            [
                'role_name' => 'Marketing',
            ],
        ]);
    }
}
