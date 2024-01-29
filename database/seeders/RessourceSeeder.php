<?php

namespace Database\Seeders;

use App\Models\Ressource;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RessourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ressources')->delete();
//        Ressource::factory()->count(20)->create();
    }
}
