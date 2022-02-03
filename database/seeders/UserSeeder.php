<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use App\Models\Doctor;
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
            "name"=>"Admin",
            "email"=>"admin@gmail.com",
            "password"=>bcrypt(123456),
            "role"=>"admin"
        ]);
        $doctor=User::create([
            "name"=>"Doctor",
            "email"=>"doctor@gmail.com",
            "password"=>bcrypt(123456),
            "role"=>"doctor"
        ]);
        Doctor::create([
            "user_id"=>$doctor->id
        ]);
        User::create([
            "name"=>"Patient",
            "email"=>"patient@gmail.com",
            "password"=>bcrypt(123456),
            "role"=>"patient"
        ]);
    }
}
