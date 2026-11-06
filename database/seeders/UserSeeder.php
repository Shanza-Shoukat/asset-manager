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
        User::updateOrCreate(
            ['email' =>'sara@expml.com',
            'name'=> 'sara',
             'password'=>'11221122',
             'active'=>true,
             'admin'=>false,
            ]
        );
        User::updateOrCreate(
            ['email' =>'ali@expml.com',
             'name'=> 'ali',
             'password'=>'11221122',
             'active'=>true,
             'admin'=>false,
            ]
        );
        User::updateOrCreate(
            ['email' =>'ifrah@expml.com',
            'name'=> 'ifrah',
             'password'=>'11221122',
             'active'=>true,
             'admin'=>false,
            ]
        );
    }
}
