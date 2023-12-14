<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class usersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([
            'name' => "admin",
            'username' => "admin",
            'email' => "admin@yahoo.com",
            'phone' => "01016070906",
            'password' => Hash::make(123),
            'role' => "admin"
        ]);

        User::insert([
            'name' => "teacher",
            'username' => "teacher",
            'email' => "teacher@yahoo.com",
            'phone' => "01009262962",
            'password' => Hash::make(123),
            'role' => "teacher"
        ]);

        User::insert([
            'name' => "student",
            'username' => "student",
            'email' => "student@yahoo.com",
            'phone' => "01278154024",
            'password' => Hash::make(123),
            'role' => "student"
        ]);

        User::insert([
            'name' => "parent",
            'username' => "parent",
            'email' => "parent@yahoo.com",
            'phone' => "01016070906p",
            'password' => Hash::make(123),
            'role' => "parent"
        ]);
    }
}
