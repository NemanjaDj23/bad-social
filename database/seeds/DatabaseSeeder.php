<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UsersTabeleSeeder::class,
            PostsTabeleSeeder::class,
            CategoriesTabeleSeeder::class,
        ]);

        //Get array of ids
        $postIds = DB::table('posts')->pluck('id')->all();
        $categoryIds = DB::table('categories')->pluck('id')->all();

        //Seed category_post table with max 40 entries
        foreach ((range(1, 70)) as $index) 
        {
        DB::table('category_post')->updateOrInsert(
            [
            'post_id' => $postIds[array_rand($postIds)],
            'category_id' => $categoryIds[array_rand($categoryIds)]
            ]
        );
        }
    }
}
