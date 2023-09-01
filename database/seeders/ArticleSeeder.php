<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 20; $i++) {
            $data = [
                'title' => 'article' . $i,
                'description' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Magni, quidem?',
                'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse voluptate deleniti in, architecto reprehenderit odit quaerat quas obcaecati voluptatem vero?',
                'articel_category_id' => rand(1, 3),
                'is_published' => 1,
                'user_id' => 1
            ];

            $data['slug'] = Str::slug($data['title']);
            $article = Article::create($data);
            $article->addMedia(public_path('dist\assets\img\400x400\img16.jpg'))->preservingOriginal()->toMediaCollection('image');
        }
    }
}
