<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 20; $i++) {
            DB::table('posts')->insert([
                'category_id' => rand(1, 10),
                'title' => 'post-' . $i,
                'slug' => 'slug-' . $i,
                'description' => 'Description of post' . $i,
                'text' => '<,>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Officiis mollitia consequatur minima totam est et officia dignissimos distinctio maxime sapiente tenetur, quibusdam incidunt cupiditate corrupti at. Cupiditate, repudiandae! Pariatur, repudiandae</p>' . "</br> $i",
            ]);
        }
    }
}
