<?php

use App\News;
use App\CategoryNews;
use Illuminate\Database\Seeder;

class CreateNewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $news = [
            'title' => 'Test Berita',
            'id_category' => 1,
            'image' => '#',
            'description' => 'test',
            'status' => true,
        ];

        $category = [
            'title' => 'General',
            'image' => '#',
            'description' => 'General Category',
            'status' => true,
        ];
        News::create($news);
        CategoryNews::create($category);
    }
}
