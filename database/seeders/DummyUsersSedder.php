<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyUsersSedder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'name' =>'Nuryadin',
                'email' =>'pemilik@gmail.com',
                'role' =>'pemilik',
                'password' =>bcrypt('pemilik')
            ],
            [
                'name' =>'Hadi Kurniawan',
                'email' =>'cutting1@gmail.com',
                'role' =>'cutting',
                'password' =>bcrypt('cutting')
            ],
            [
                'name' =>'Ibu',
                'email' =>'jahit1@gmail.com',
                'role' =>'jahit',
                'password' =>bcrypt('penjahit')
            ],
            [
                'name' =>'Rian',
                'email' =>'jahit2@gmail.com',
                'role' =>'jahit',
                'password' =>bcrypt('penjahit')
            ],
            [
                'name' =>'Diman',
                'email' =>'jahit3@gmail.com',
                'role' =>'jahit',
                'password' =>bcrypt('penjahit')
            ],
            [
                'name' =>'Hanifa',
                'email' =>'packing1@gmail.com',
                'role' =>'packing',
                'password' =>bcrypt('packing')
            ],
        ];
        foreach ($userData as $key => $val) {
            User::create($val);
        }
    }
}
