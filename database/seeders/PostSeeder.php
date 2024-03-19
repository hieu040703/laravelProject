<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('authors')->delete();
        DB::table('categories')->delete();
        DB::table('tags')->delete();
        DB::table('posts')->delete();
        DB::table('post_tag')->delete();

        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 5; $i++) {
            DB::table('authors')->insert([
                'name' => $faker->name,
                'avatar' => $faker->imageUrl,
            ]);
        }

        for ($i = 0; $i < 10; $i++) {
            DB::table('categories')->insert([
                'name' => $faker->realText(50),
            ]);
        }

        for ($i = 0; $i < 20; $i++) {
            DB::table('tags')->insert([
                'name' => $faker->realText(50),
            ]);
        }

        $data = [];
        for ($i = 0; $i < 250001; $i++) {
            $data[] = [
                'author_id' => rand(1, 5),
                'category_id' => rand(1, 10),
                'title' => $faker->text(100),
                'excerpt' => $faker->text,
                'img' => $faker->imageUrl,
                'content' => $faker->text,
                'is_trending' => rand(0, 1),
                'view_count' => rand(100, 1000),
                'status' => '1',
            ];
            if ($i % 500 == 0) {
                DB::table('posts')->insert($data);
                $data = [];
            }
        }
        $data = []; 
        for ($i = 1; $i < 250000; $i++) {
            $data[] = ['post_id' => $i, 'tag_id' =>1];
            $data[] = ['post_id' => $i, 'tag_id' =>2];
            $data[] = ['post_id' => $i, 'tag_id' =>3];
            $data[] = ['post_id' => $i, 'tag_id' =>4];
            if($i % 500 == 0) {
                DB::table('post_tag')->insert($data);
                $data = [];
            }
        }
    }
}
