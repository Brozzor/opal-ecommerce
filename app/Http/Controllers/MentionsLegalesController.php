<?php

namespace App\Http\Controllers;

use View;
use Illuminate\Http\Request;

class MentionsLegalesController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        return view('mentions');
    }
}
