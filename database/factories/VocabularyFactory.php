<?php

namespace Creode\LaravelTaxonomy\Database\Factories;

use Creode\LaravelTaxonomy\Models\Vocabulary;
use Illuminate\Database\Eloquent\Factories\Factory;

class VocabularyFactory extends Factory
{
    protected $model = Vocabulary::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'description' => $this->faker->text,
        ];
    }
}
