<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 20; $i++) {
            DB::table('books')->insert([
                'author_id' => rand(1, 21),
                'title' => Str::random(10),
                'photo' => Str::random(10),
                'page' => rand(50, 300),
            ]);
        }
    }
}
