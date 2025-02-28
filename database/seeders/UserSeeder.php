<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name'=>'haw',
            'email'=>'htet@gmail.com',
            'phone'=>'09774858790',
            'address'=>'Yangon, Myanmar',
            'gender'=>'male',
            'password'=>Hash::make('password')
        ]);

    }
}
