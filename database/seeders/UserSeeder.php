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
        User::create([
            'name' => 'Alya Mufthia',
            'email'=>'Alya123@gmail.com',
            'password'=> bcrypt('alya123'),
            'no_hp'=>'081234567',
            'alamat'=>'jln.danau12',
            'role'=>'user'
        ]);

        User::create([
            'name' => 'qiaraa',
            'email'=>'qiara12@gmail.com',
            'password'=> bcrypt('qiara12'),
            'no_hp'=>'081234654',
            'alamat'=>'jln.amplas12',
            'role'=>'admin'
        ]);
    }
}
