<?php

namespace Database\Factories;

use App\Models\Question;
use App\Models\Quiz;
use Faker\Provider\Lorem;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuestionFactory extends Factory
{

    protected $model = Question::class;

    public function definition()
    {
        $question_en = $this->faker->sentence; // Generate English title
        $question_fr = Lorem::sentence(); // Generate French title
        $question_ar = 'عنوان الدرس باللغة العربية'; // Arabic title

        $answer_en = $this->faker->sentence; // Generate English title
        $answer_fr = Lorem::sentence(); // Generate French title
        $answer_ar = 'عنوان الدرس باللغة العربية'; // Arabic title

        $answerA_en = $this->faker->sentence; // Generate English title
        $answerA_fr = Lorem::sentence(); // Generate French title
        $answerA_ar = 'عنوان الدرس باللغة العربية'; // Arabic title

        $answerB_en = $this->faker->sentence; // Generate English title
        $answerB_fr = Lorem::sentence(); // Generate French title
        $answerB_ar = 'عنوان الدرس باللغة العربية'; // Arabic title

        $answerC_en = $this->faker->sentence; // Generate English title
        $answerC_fr = Lorem::sentence(); // Generate French title
        $answerC_ar = 'عنوان الدرس باللغة العربية'; // Arabic title

        return [
            'quiz_id' => Quiz::inRandomOrder()->first()->id,
            'question' =>  $question_en,
            'answer' => $answer_en,
            'answerA' =>$answerA_en,
            'answerB' =>$answerB_en,
            'answerC' =>$answerC_en,
        ];
    }
}
