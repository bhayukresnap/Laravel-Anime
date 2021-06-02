<?php

namespace Database\Factories;

use App\Models\People;
use Illuminate\Database\Eloquent\Factories\Factory;

class PeopleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = People::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->name,
            'slug' => $this->faker->numerify('##########'),
            'given_name' => $this->faker->unique()->name,
            'website' => '-',
            'birthday' => '12 May 2021',
            'family_name' => $this->faker->unique()->name,
            'description' => $this->faker->text(),
            'photo' => '/assets/cms/images/0.jpg',
            'thumbnail' => '/assets/cms/images/0.jpg',
        ];
    }
}
