<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'name'=>'bob',
            'email'=>'bob@gmail.com',
            'phone'=>'09774858790',
            'address'=>'Yangon, Myanmar',
            'gender'=>'male',
            'password'=>Hash::make('password')
        ]);

        $guest = User::create([
            'name'=>'alice',
            'email'=>'alice@gmail.com',
            'phone'=>'09774858790',
            'address'=>'Yangon, Myanmar',
            'gender'=>'male',
            'password'=>Hash::make('password')
        ]);

        $admin->assignRole('admin');
        $guest->assignRole('guest');

    }
}
