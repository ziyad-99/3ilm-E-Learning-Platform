<?php

namespace Database\Factories;

use App\Models\Instructor;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class InstructorFactory extends Factory
{
    protected $model = Instructor::class;

    public function definition()
    {
        return [
            'firstName' => $this->faker->name(),
            'lastName' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'phone' => $this->faker->phoneNumber(),
            'password' => Hash::make('123456789'), // password
            'state' => $this->faker->randomElement(['biskra', 'el-oued']),
            'bio' => $this->faker->paragraph,
            'gender' => $this->faker->randomElement(['male', 'female']),
            'facebook' => $this->faker->url,
            'instagram' => $this->faker->url,
            'remember_token' => Str::random(10),
        ];
    }
}
