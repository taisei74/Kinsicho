<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ShopsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            DB::table('shops')->insert([
            [
            'name' => 'サイゼリア',
            'money' => 500,
            'body' => 'サイゼリア　錦糸町店です。',
            'created_at' =>new Datetime(),
            'updated_at' =>new Datetime()
            ],
            [
                'name' => '馬力',
            'money' => 1500,
            'body' => '錦糸町の居酒屋です',
            'created_at' =>new Datetime(),
            'updated_at' =>new Datetime()
            ],
            [
                'name' => 'ダーツ',
            'money' => 1000,
            'body' => '錦糸町のダーツバーです',
            'created_at' =>new Datetime(),
            'updated_at' =>new Datetime()
            ],
             [
                'name' => 'ガスト',
            'money' => 800,
            'body' => '錦糸町のガストです',
            'created_at' =>new Datetime(),
            'updated_at' =>new Datetime()
            ],
             [
                'name' => '鳥貴族',
            'money' => 2000,
            'body' => '錦糸町の居酒屋鳥貴族です',
            'created_at' =>new Datetime(),
            'updated_at' =>new Datetime()
            ],
             [
                'name' => '錦糸公園',
            'money' => 0,
            'body' => '錦糸町の公園です',
            'created_at' =>new Datetime(),
            'updated_at' =>new Datetime()
            ],
            ]);
    }
}
