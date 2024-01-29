<?php

namespace Database\Seeders;

use App\Models\Discussion;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DiscussionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('discussions')->delete();
//        Discussion::factory()->count(20)->create();
    }
}
