<?php

namespace Database\Factories;

use App\Models\Ressource;
use App\Models\Session;
use Illuminate\Database\Eloquent\Factories\Factory;

class RessourceFactory extends Factory
{
    protected $model = Ressource::class;

    public function definition()
    {
        return [
            'session_id' => Session::inRandomOrder()->first()->id,
            'filename' => 'finename.pdf',
            'date' => $this->faker->date,
        ];
    }
}
