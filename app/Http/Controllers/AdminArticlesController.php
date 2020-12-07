<?php

namespace App\Http\Controllers;
use App\Models\Article;
use Illuminate\Http\Request;

class AdminArticlesController extends Controller
{
    public function index()
    {
        $articles = Article::orderBy('id', 'desc')->paginate(20);
        return view('admin/articles', compact("articles"));
    }

    public function destroy(Request $request)
    {
        $article = Article::find($request->get('id'));
        $article->delete();
        return redirect()->route('articles.index');
    }

    public function edit($id)
    {
        $article = Article::find($id);
        return view('admin/articlesEdit', compact('article'));
    }
}
