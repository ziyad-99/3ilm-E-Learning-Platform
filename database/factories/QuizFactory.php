<?php

namespace Database\Factories;

use App\Models\Quiz;
use App\Models\Session;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuizFactory extends Factory
{
    protected $model = Quiz::class;

    public function definition()
    {
        return [
            'session_id' => Session::inRandomOrder()->first()->id,
            'quizName' => $this->faker->word,
            'totalQuestions' => $this->faker->randomElement([1, 2, 3, 4, 5, 6, 7, 8]),
            'quizType' => $this->faker->randomElement(['type1', 'type2', 'type3', 'type4', 'type5']),
            'date' => $this->faker->date,
            'duration' => $this->faker->time,
            'markPerQuestion' => $this->faker->randomElement([1, 2]),
            'status' => $this->faker->randomElement(['active', 'nonActive']),
        ];
    }
}
