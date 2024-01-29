<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'firstName' => $this->faker->name(),
            'lastName' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'phone' => $this->faker->phoneNumber(),
            'password' => Hash::make('123456789'), // password
            'state' => $this->faker->randomElement(['biskra', 'el oued']),
            'bio' => $this->faker->paragraph,
            'gender' => $this->faker->randomElement(['male', 'female']),
            'facebook' => $this->faker->url,
            'instagram' => $this->faker->url,
            'status' => $this->faker->randomElement([1, 0]),
            'balance' => $this->faker->numberBetween(0, 10000),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
