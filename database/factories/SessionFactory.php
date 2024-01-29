<?php

namespace Database\Factories;

use App\Models\Course\IntensiveCourse;
use App\Models\Course\LanguageCourse;
use App\Models\Course\SupportingCourse;
use App\Models\Session;
use Illuminate\Database\Eloquent\Factories\Factory;

class SessionFactory extends Factory
{
    protected $model = Session::class;

    public function definition()
    {
        return [
            'name' => $this->faker->randomElement(['session1', 'session2', 'session3', 'session3', 'session4', 'session5', 'session6', 'session7', 'session8', 'session9']),
            'courseable_id' => $this->faker->randomElement([
                SupportingCourse::inRandomOrder()->first()->id,
                IntensiveCourse::inRandomOrder()->first()->id,
                LanguageCourse::inRandomOrder()->first()->id,]),
            'courseable_type' => $this->faker->randomElement([
                'App\Models\Course\SupportingCourse',
                'App\Models\Course\LanguageCourse',
                'App\Models\Course\IntensiveCourse',
            ]),
            'meetingID' => $this->faker->uuid,
            'attendeePW' => $this->faker->word,
            'moderatorPW' => $this->faker->word,
            'startDate' => $this->faker->dateTimeBetween('now', '+4 year'),
//            'bbbLink' => $this->faker->url,
//            'logoutURL' => $this->faker->url,
//            'endCallbackUrl' => $this->faker->url,
//            'recordedLink' => $this->faker->url,
            'status' => $this->faker->boolean,
        ];
    }
}
