<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('plans')->insert([
            [
            'plan_name' => '錦糸町ファーストフード',
          　'user_id' => 2,
            'created_at' =>new Datetime(),
            'updated_at' =>new Datetime()
            ],
            ]);
    }
}
