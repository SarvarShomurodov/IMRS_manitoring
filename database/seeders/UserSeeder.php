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
            'email' => 'abdixojayev@imrs.uz',
            'password' => Hash::make('password'),
            'role' => 'superadmin',
        ]);
        User::create([
            'name' => 'Qutliyev',
            'email' => 'qutliyev@imrs.uz',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);
    
        User::create([
            'name' => 'Qarabayeva',
            'email' => 'qarabayeva@imrs.uz',
            'password' => Hash::make('password'),
            'role' => 'editor',
        ]);
    
        User::create([
            'name' => 'Xalbayev',
            'email' => 'xalbayev@imrs.uz',
            'password' => Hash::make('password'),
            'role' => 'moderator',
        ]);
    
        User::create([
            'name' => 'Axmedova',
            'email' => 'axmedova@imrs.uz',
            'password' => Hash::make('password'),
            'role' => 'author',
        ]);
    
        User::create([
            'name' => 'Maxmudov',
            'email' => 'maxmudov@imrs.uz',
            'password' => Hash::make('password'),
            'role' => 'subscriber',
        ]);
    
        User::create([
            'name' => 'Turdiyev',
            'email' => 'turdiyev@imrs.uz',
            'password' => Hash::make('password'),
            'role' => 'noner',
        ]);
        $users = [
            ['name' => 'Sanoat', 'email' => 'sanoat@imrs.uz', 'role' => 'loyigaRaxbar'],
            ['name' => 'Energo', 'email' => 'energo@imrs.uz', 'role' => 'loyigaRaxbar'],
            ['name' => 'Agro', 'email' => 'agro@imrs.uz', 'role' => 'loyigaRaxbar'],
            ['name' => 'Invest', 'email' => 'invest@imrs.uz', 'role' => 'loyigaRaxbar'],
            ['name' => 'Raqam', 'email' => 'raqam@imrs.uz', 'role' => 'loyigaRaxbar'],
            ['name' => 'Bisness', 'email' => 'bisness@imrs.uz', 'role' => 'loyigaRaxbar'],
            ['name' => 'Ermarkaz', 'email' => 'ermarkaz@imrs.uz', 'role' => 'loyigaRaxbar'],
            ['name' => 'Makro', 'email' => 'makro@imrs.uz', 'role' => 'loyigaRaxbar'],
            ['name' => 'Tashqisavdo', 'email' => 'tashqisavdo@imrs.uz', 'role' => 'loyigaRaxbar'],
            ['name' => 'Hudud', 'email' => 'hudud@imrs.uz', 'role' => 'loyigaRaxbar'],
            ['name' => 'Urban', 'email' => 'urban@imrs.uz', 'role' => 'loyigaRaxbar'],
            ['name' => 'Insonkapital', 'email' => 'insonkapital@imrs.uz', 'role' => 'loyigaRaxbar'],
            ['name' => 'Monetar', 'email' => 'monetar@imrs.uz', 'role' => 'loyigaRaxbar'],
            ['name' => 'Kambagallik', 'email' => 'kambagallik@imrs.uz', 'role' => 'loyigaRaxbar'],
            ['name' => 'Xizmatlar', 'email' => 'xizmatlar@imrs.uz', 'role' => 'loyigaRaxbar'],
            ['name' => 'Callmarkaz', 'email' => 'callmarkaz@imrs.uz', 'role' => 'loyigaRaxbar'],
        ];
        foreach ($users as $user) {
            User::create([
                'name' => $user['name'],
                'email' => $user['email'],
                'password' => Hash::make('password'),
                'role' => $user['role'],
            ]);
        }
    }
}
