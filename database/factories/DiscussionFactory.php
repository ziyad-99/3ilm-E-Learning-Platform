<?php

namespace Database\Factories;

use App\Models\Discussion;
use App\Models\Session;
use Illuminate\Database\Eloquent\Factories\Factory;

class DiscussionFactory extends Factory
{
    protected $model = Discussion::class;

    public function definition()
    {
        return [
            'session_id' => Session::inRandomOrder()->first()->id,
        ];
    }
}
