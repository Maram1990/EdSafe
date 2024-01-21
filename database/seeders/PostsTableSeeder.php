<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        \App\Models\Post::factory(10)->create();

        \App\Models\Post::factory()->create([
            'title' => 'title',
            'content' => 'testcontent',
         ]);


    }
}
