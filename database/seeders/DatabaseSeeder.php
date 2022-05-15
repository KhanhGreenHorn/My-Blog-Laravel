<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Exception;
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
        $users = User::factory(7)->create();

        $categories = array();
        $categories[] = Category::create([
            'name' => 'Work',
            'description' => 'work topics'
        ]);

        $categories[] = Category::create([
            'name' => 'School',
            'description' => 'school topics'
        ]);

        $categories[] = Category::create([
            'name' => 'Hobbies',
            'description' => 'hobbies topics'
        ]);

        $posts = array();

        foreach($users as $user){
            foreach($categories as $category){
                $post = Post::factory(1)->create([
                    'category_id' => $category->id,
                    'user_id' => $user->id
                ]);
                $posts[] = $post[0]; 
            }
        };

        foreach($posts as $post){
            foreach($users as $user){
                if( (int)($user->id) % 2 == 0) continue; //only half of users comment
                Comment::factory(1)->create([
                'user_id' => $user->id,
                'post_id' => $post->id, 
                ]);
            }
        };
        
    }
}
