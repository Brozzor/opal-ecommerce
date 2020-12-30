<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class MagasinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->get('categorie') && $request->get('prix')){
            $articles = Article::where('genre', $request->get('categorie'))->orderBy('price', $request->get('prix'))->paginate(12, ['*'], 'page');
        } elseif ($request->get('categorie')) {
            $articles = Article::where('genre', $request->get('categorie'))->orderBy('id', 'desc')->paginate(12, ['*'], 'page');
        } elseif ($request->get('prix')) {
            $articles = Article::orderBy('price', $request->get('prix'))->paginate(12, ['*'], 'page');
        }else{
            $articles = Article::orderBy('id', 'desc')->paginate(12, ['*'], 'page');
        }

        //$articles = Article::orderBy('id', 'desc')->paginate(9);
        return view('magasin', compact("articles"));
    }
    

}
