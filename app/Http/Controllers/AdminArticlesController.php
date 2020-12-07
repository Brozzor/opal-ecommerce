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

    public function add()
    {
        return view('admin/articlesAdd');
    }

    public function update(Request $request, $id)
    {
        $article = Article::find($id);
        $article->name = $request->get('name');
        $article->description = $request->get('description');
        $article->color = $request->get('color');
        $article->genre = $request->get('genre');
        $article->brand = $request->get('brand');
        $article->price = $request->get('price');
        $article->updated_at = date('Y-m-d H:i:s');
        $article->imgLink = $request->get('imgLink');
        $article->save();

        return redirect()->route('articles.index');
    }

    public function store(Request $request)
    {
        $article = new Article();
        $article->name = $request->get('name');
        $article->description = $request->get('description');
        $article->color = $request->get('color');
        $article->genre = $request->get('genre');
        $article->brand = $request->get('brand');
        $article->price = $request->get('price');
        $article->created_at = date('Y-m-d H:i:s');
        $article->updated_at = date('Y-m-d H:i:s');
        $article->imgLink = $request->get('imgLink');

        $article->save();

        return redirect()->route('articles.index');
    }
}
