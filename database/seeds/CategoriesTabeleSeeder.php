<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesTabeleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'name' => 'Sport',
            ],
            [
                'name' => 'World',
            ],
            [
                'name' => 'Life',
            ],
            [
                'name' => 'Health',
            ],
            [
                'name' => 'Culture',
            ],
            [
                'name' => 'Movies',
            ],
            [
                'name' => 'Economy',
            ],
            [
                'name' => 'Education',
            ],
            [
                'name' => 'Politics',
            ],
            [
                'name' => 'Food and Cooking',
            ],
            [
                'name' => "Animals and Nature",
            ],   
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
