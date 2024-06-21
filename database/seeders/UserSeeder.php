<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user1 = User::create([
        'name' => 'admin',
        'email' => 'admin@example.com',
        'password' => bcrypt('1'),
        'role' => 'admin'
        ]);
        $user1->assignRole('admin');

        $user2 = User::create([
        'name' => 'penjaga',
        'email' => 'penjaga@example.com',
        'password' => bcrypt('2'),
        'role' => 'penjaga'
        ]);
        $user2->assignRole('penjaga');
    }
}
