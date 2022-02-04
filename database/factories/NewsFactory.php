<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class NewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $categories=["Radiology","Pathology","Cardiology","Sergery","Gastroenterology"];
        return [
            "title"=>$this->faker->sentence(10),
            "image"=>$this->faker->imageUrl(200,160),
            "status"=>$this->faker->randomElement(["Active","Inactive"]),
            "tags"=>$this->faker->words(5,true),
            "category"=>$this->faker->randomElement($categories),
            "body"=>$this->faker->paragraph(50),
            "user_id"=>$this->faker->numberBetween(1,50)
            
        ];
    }
}
