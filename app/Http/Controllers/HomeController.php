<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class HomeController extends Controller
{
    public function index()
    {
        $article = Article::paginate(3);

        return view('home', ['article' => $article]);
    }
}
