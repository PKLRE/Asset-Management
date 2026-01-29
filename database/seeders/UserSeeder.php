<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin
        User::create([
            'name' => 'brian',
            'email' => 'bryan@example.com',
            'password' => Hash::make('briangaming123'),
            'role' => 'admin',
        ]);

        // PIC setiap lantai 
        User::create([
            'name' => 'PIC Lantai Mezanine',
            'email' => 'picM@example.com',
            'password' => Hash::make('picm1234'),
            'role' => 'pic',
            'created_by' => 1,
        ]);
        User::create([
            'name' => 'PIC Lantai 1',
            'email' => 'pic1@example.com',
            'password' => Hash::make('picsatu24'),
            'role' => 'pic',
            'created_by' => 1,
        ]);
        User::create([
            'name' => 'PIC Lantai 2',
            'email' => 'pic2@example.com',
            'password' => Hash::make('picdua34'),
            'role' => 'pic',
            'created_by' => 1,
        ]);
        User::create([
            'name' => 'PIC Lantai 3',
            'email' => 'pic3@example.com',
            'password' => Hash::make('pictiga45'),
            'role' => 'pic',
            'created_by' => 1,
        ]);

        // Staff
        User::create([
            'name' => 'Staff',
            'email' => 'staff@example.com',
            'password' => Hash::make('staf1234'),
            'role' => 'staff',
            'created_by' => 1,
        ]);

        //jews
        User::create([
            'name' => 'JEWS',
            'email' => 'jews@example.com',
            'password' => Hash::make('yahoodie122'),
            'role' => 'jews',
            'created_by' => 1,
        ]);
    }
}
