<?php

namespace Database\Seeders;

use App\Models\WaitingList;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WaitingListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('waiting_lists')->delete();
        WaitingList::factory()->count(20)->create();
    }
}
