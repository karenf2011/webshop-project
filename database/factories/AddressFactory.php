<?php

namespace Database\Factories;

use App\Models\Address;
use Illuminate\Database\Eloquent\Factories\Factory;

class AddressFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Address::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id'        => $this->faker->numberBetween(1,2),
            'street_address' => $this->faker->streetAddress(),
            'postal_code'    => $this->faker->postcode(),
            'city'           => $this->faker->city(),
            'country'        => $this->faker->country(),
        ];
    }
}
