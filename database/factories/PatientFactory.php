<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
class PatientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model=User::class;
    public function definition()
    {
         return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            "phone"=>$this->faker->phoneNumber(),
            "image"=>$this->faker->imageUrl(50,50),
            "role"=>"patient",
            'email_verified_at' => now(),
            'password' => bcrypt(123456), // password
            'remember_token' => Str::random(10),
        ];
    }
}
