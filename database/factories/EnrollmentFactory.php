<?php

namespace Database\Factories;

use App\Models\Course\IntensiveCourse;
use App\Models\Course\LanguageCourse;
use App\Models\Course\SupportingCourse;
use App\Models\Enrollment;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class EnrollmentFactory extends Factory
{
    protected $model = Enrollment::class;

    public function definition()
    {
        return [
            'student_id' => User::inRandomOrder()->first()->id,
            'courseable_id' => $this->faker->randomElement([
                SupportingCourse::inRandomOrder()->first()->id,
                IntensiveCourse::inRandomOrder()->first()->id,
                LanguageCourse::inRandomOrder()->first()->id,]),
            'courseable_type' => $this->faker->randomElement([
                'App\Models\Course\SupportingCourse',
                'App\Models\Course\LanguageCourse',
                'App\Models\Course\IntensiveCourse',
            ]),
            'date' => $this->faker->dateTimeBetween('now', '+4 year'),
        ];
    }
}
