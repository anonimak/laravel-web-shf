<?php

use App\News;
use App\TypeNews;
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
            'id_type' => 1,
            'image' => '#',
            'description' => 'test',
            'status' => true,
        ];

        $types = [
            [
                'type' => 'News',
                'status' => true,
            ],
            [
                'type' => 'Social',
                'status' => true,
            ]
        ];

        
        foreach($types as $type){
            TypeNews::create($type);
        }
        
        News::create($news);

    }
}
