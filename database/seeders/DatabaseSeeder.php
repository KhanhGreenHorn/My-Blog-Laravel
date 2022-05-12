<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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

        Category::create([
            'name' => 'Work',
            'description' => 'work topics'
        ]);

        Category::create([
            'name' => 'School',
            'description' => 'school topics'
        ]);

        Category::create([
            'name' => 'Hobbies',
            'description' => 'hobbies topics'
        ]);

        Post::factory(3)->create([
            'category_id' => 1
        ]);

        Post::factory(5)->create([
            'category_id' => 2
        ]);

        Post::factory(3)->create([
            'category_id' => 3
        ]);
    }
}
