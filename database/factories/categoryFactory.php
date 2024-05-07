<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Pest\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\category>
 */
class categoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name= $this->faker->words(2,true);
        return [
           'name'=>$name,
           
           'slug'=> $this->faker->word(),
           'description'=> $this->faker->sentence(15),
           'image'=>$this->faker->imageUrl,
        ];
    }
}
