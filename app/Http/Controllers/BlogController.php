<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ArticelCategory;
use App\Models\Article;

class BlogController extends Controller
{
    public function index()
    {
        $articleCategory = ArticelCategory::All();
        $article = Article::All();

        return view('blog', ['articleCategory' => $articleCategory], ['article' => $article]);
    }
}
