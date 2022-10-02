<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class GenreTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('genres')->insert([
            ['genre_name' => '公園',
            'created_at' =>new Datetime(),
            'updated_at' =>new Datetime()
            ],
            ['genre_name' => '神社',
            'created_at' =>new Datetime(),
            'updated_at' =>new Datetime()
             ],
            ['genre_name' => 'カフェ',
            'created_at' =>new Datetime(),
            'updated_at' =>new Datetime()
            ],
            ['genre_name' => '居酒屋',
            'created_at' =>new Datetime(),
            'updated_at' =>new Datetime()
            ],
            ['genre_name' => 'ファーストフード',
            'created_at' =>new Datetime(),
            'updated_at' =>new Datetime()
            ],
            ]);
    }
}
