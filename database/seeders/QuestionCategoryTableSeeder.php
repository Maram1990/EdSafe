<?php

namespace Database\Seeders;

use App\Models\QuestionCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuestionCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        {
            $questioncategorys = [
                [
                    'id' => 1,
                    'name' => 'اختيار من متعدد',
                ],
                [
                    'id' => 2,
                    'name' => 'صح أو خطأ',
                ]
            ];

            QuestionCategory::insert($questioncategorys);
        }
    }
}
