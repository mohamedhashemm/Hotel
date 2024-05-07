<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Stringable;
use Pest\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\store>
 */
class storeFactory extends Factory
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
        //    'image'=>$this->faker->imageUrl,
           'logo_image'=>$this->faker->imageUrl(300,300),
           'cover_image'=>$this->faker->imageUrl(300,600),
        ];
    }
}
