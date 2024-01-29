<?php

namespace Database\Factories;

use App\Models\Course\IntensiveCourse;
use App\Models\Course\LanguageCourse;
use App\Models\Course\SupportingCourse;
use App\Models\Group;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class GroupFactory extends Factory
{
    protected $model = Group::class;

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
            'groupName' => $this->faker->randomElement(['group1', 'group2', 'group3', 'group3', 'group4', 'group5', 'group6', 'group7', 'group8', 'group9']),
        ];
    }
}
