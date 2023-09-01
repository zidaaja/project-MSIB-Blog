<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class DetailController extends Controller
{
    public function index($id)
    {
        $article = Article::findOrFail($id);

        return view('blog-detail', ['article' => $article]);
    }
}
