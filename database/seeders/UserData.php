<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserData extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = [
            [
                'name' => 'Administrator',
                'username' => 'admin',
                'password' => bcrypt('1234567'),
                'level' => 1,
                'email' => 'administrator@gmail.com'
            ],
            [
                'name' => 'Kasir',
                'username' => 'kasir',
                'password' => bcrypt('1234567'),
                'level' => 2,
                'email' => 'kasir@gmail.com'
            ],
            [
                'name' => 'Owner',
                'username' => 'owner',
                'password' => bcrypt('1234567'),
                'level' => 3,
                'email' => 'owner@gmail.com'
            ],
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
