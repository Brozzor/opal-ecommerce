<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function getSearch()
        {
            //get keywords input for search
            $keyword=  Input::get('q');

            //search that student in Database
             $articles= Article::find($keyword);

            //return display search result to user by using a view
            return View::make('magasin')->with('article', $students);
        }

    }

