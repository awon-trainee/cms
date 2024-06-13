<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'name' => 'Mazen',
            'email' => 'mazen@mazen.com',
            'password' => bcrypt('1'),
        ]);
        $admin->assignRole('Admin');
    }
}
