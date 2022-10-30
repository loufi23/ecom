<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProduitFactory extends Factory
{
    //protected $model= Produit::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nom' => $this->faker->word(),
            'prix' => $this->faker->numberBetween($int1=100,$int2=10000),
            'details' => $this->faker->text(),
            'image' => $this->faker->imageUrl(100, 100),
            'categorie_id' => rand(1,5),
        ];
    }
}
