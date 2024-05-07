<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\store;
use Illuminate\Database\Eloquent\Factories\Factory;
use Pest\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class productFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name= $this->faker->words(3,true);
        return [
           'name'=>$name,
           'slug'=> $this->faker->word(3),
           'description'=> $this->faker->sentence(15),
           'image'=>$this->faker->imageUrl(300,600),
           'price'=>$this->faker->randomFloat(1,1,900),
           'compare_price'=>$this->faker->randomFloat(1,400,500),
           'category_id'=> Category::inRandomOrder()->first()->id,
           'featured'=>rand(0,1),
           'store_id'=> store::inRandomOrder()->first()->id,
        ];
    }
}
