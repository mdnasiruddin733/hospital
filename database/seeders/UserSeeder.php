<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use App\Models\Doctor;
use Database\Factories\PatientFactory;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        

        User::factory()->count(50)->doctor()->create();

        foreach(range(1,50) as $i){
            Doctor::create([
                "user_id"=>$i,
                "specialization"=>"Cardiology",
                "whatsapp"=>"016xxxxxxx",
                "meet_link"=>"https://www.meet.google.com",
                "detail"=>"A physician or medical doctor is a person who uses medicine to treat illness and injuries to improve a patient's health. In most countries, the basic medical degree qualifies a person to treat patients and prescribe appropriate treatment, including drugs. A physician may also do the simplest kinds of surgery .",
                "time"=>"7:30 PM",
                "day"=>"Sunday",
                "status"=>1,
                "room"=>102
            ]);
        }

        User::factory()->count(50)->patient()->create();
        
        User::create([
            "name"=>"Admin",
            "email"=>"admin@gmail.com",
            "password"=>bcrypt(123456),
            "role"=>"admin"
        ]);
       
        
    }
}
