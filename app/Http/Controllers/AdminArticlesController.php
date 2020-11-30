<?php

namespace App\Http\Controllers;
use App\Models\Article;
use Illuminate\Http\Request;

class AdminArticlesController extends Controller
{
    public function index()
    {
        $articles = Article::paginate(20);
        return view('admin/articles', compact("articles"));
    }
}
