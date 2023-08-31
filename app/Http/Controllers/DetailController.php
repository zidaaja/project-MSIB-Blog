<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class DetailController extends Controller
{
    public function index()
    {
        $article = Article::All();

        return view('home', ['article' => $article]);
    }
}
