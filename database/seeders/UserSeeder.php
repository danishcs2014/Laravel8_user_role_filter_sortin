<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        //
        DB::table('users')->insert([[
            'email'=>'danishcs2014@gmail.com',
            'password'=>Hash::make('12345'),
            'mobile'=>'8010631710',
            'profile_score'=>8
        ],
        [
            'email'=>'Test1@gmail.com',
            'password'=>Hash::make('12345'),
            'mobile'=>'8010631710',
            'profile_score'=>9
        ],
        [
            'email'=>'Test2@gmail.com',
            'password'=>Hash::make('12345'),
            'mobile'=>'8010631710',
            'profile_score'=>8
        ],
        [
            'email'=>'Test3@gmail.com',
            'password'=>Hash::make('12345'),
            'mobile'=>'8010631710',
            'profile_score'=>8
        ],
        [
            'email'=>'Test4@gmail.com',
            'password'=>Hash::make('12345'),
            'mobile'=>'8010631710',
            'profile_score'=>9
        ],
        [
            'email'=>'Test5@gmail.com',
            'password'=>Hash::make('12345'),
            'mobile'=>'8010631710',
            'profile_score'=>8
        ],
        [
            'email'=>'Test6@gmail.com',
            'password'=>Hash::make('12345'),
            'mobile'=>'8010631710',
            'profile_score'=>6
        ],
        [
            'email'=>'Test7@gmail.com',
            'password'=>Hash::make('12345'),
            'mobile'=>'8010631710',
            'profile_score'=>7
        ],
        [
            'email'=>'Test8@gmail.com',
            'password'=>Hash::make('12345'),
            'mobile'=>'8010631710',
            'profile_score'=>5
        ],
        [
            'email'=>'Test9@gmail.com',
            'password'=>Hash::make('12345'),
            'mobile'=>'8010631710',
            'profile_score'=>10
        ],
        [
            'email'=>'Test10@gmail.com',
            'password'=>Hash::make('12345'),
            'mobile'=>'8010631710',
            'profile_score'=>8
        ]


    ]);
    }
}
