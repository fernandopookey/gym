<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'full_name'     => 'Admin',
            'email'         => 'admin@gmail.com',
            'roles'         => 'ADMIN',
            'gender'        => 'Male',
            'club'          => 'Gelora-GYM',
            'password'      => Hash::make('1')
        ]);
    }
}
