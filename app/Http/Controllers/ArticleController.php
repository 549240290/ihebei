<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    public function index(Article $article){
        return view('home.show',['article'=>$article]);
    }
}
