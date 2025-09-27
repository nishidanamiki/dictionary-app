<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DictionarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'keyword' => 'apple',
            'description' => 'A kind of fruit. Also a famous tech company.',
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ];
        DB::table('dictionaries')->insert($param);
        $param = [
            'keyword' => 'book',
            'description' => 'A collection of written or printed pages bound together.',
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ];
        DB::table('dictionaries')->insert($param);
        $param = [
            'keyword' => 'hydrogen',
            'description' => 'The first element in the periodic table, symbol H.',
            'user_id' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ];
        DB::table('dictionaries')->insert($param);
        $param = [
            'keyword' => 'Laravel',
            'description' => 'A PHP framework for building web applications.',
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ];
        DB::table('dictionaries')->insert($param);
        $param = [
            'keyword' => 'sun',
            'description' => 'The star at the center of the solar system.',
            'user_id' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ];
        DB::table('dictionaries')->insert($param);
    }
}
