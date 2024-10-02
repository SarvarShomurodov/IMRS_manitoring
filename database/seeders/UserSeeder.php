<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
{
    User::create([
        'name' => 'Abdixojayev',
        'email' => 'abdixojayev@example.com',
        'password' => Hash::make('password'),
        'role' => 'superadmin',
    ]);
    User::create([
        'name' => 'Qutliyev',
        'email' => 'qutliyev@example.com',
        'password' => Hash::make('password'),
        'role' => 'admin',
    ]);

    User::create([
        'name' => 'Qarabayeva',
        'email' => 'qarabayeva@example.com',
        'password' => Hash::make('password'),
        'role' => 'editor',
    ]);

    User::create([
        'name' => 'Xalbayev',
        'email' => 'xalbayev@example.com',
        'password' => Hash::make('password'),
        'role' => 'moderator',
    ]);

    User::create([
        'name' => 'Axmedova',
        'email' => 'axmedova@example.com',
        'password' => Hash::make('password'),
        'role' => 'author',
    ]);

    User::create([
        'name' => 'Maxmudov',
        'email' => 'maxmudov@example.com',
        'password' => Hash::make('password'),
        'role' => 'subscriber',
    ]);
}
}
