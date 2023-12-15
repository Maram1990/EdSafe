<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker=Factory::create();
        for ($i=0;$i<=10;$i++){
            Post::create([
                'title'=>$faker->sentence(10),
                'body'=>$faker->sentence(100),
                'user_id'=>User::all()->random()->id,
                'active'=>$faker->boolean()
            ]);
        }
    }
}
