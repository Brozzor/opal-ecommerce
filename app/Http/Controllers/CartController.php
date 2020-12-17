<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Cart;

class CartController extends Controller
{
    public function index()
    {
        $items = Cart::getContent();
        return view('cart', compact("items"));
    }

    public function store(Request $request)
    {
        $article = Article::findOrFail($request->id);

        Cart::add(
            [
                'id' => $article->id,
                'name' => $article->name,
                'price' => $article->price,
                'attributes' => [$article->color, $article->brand, $article->genre,$article->imgLink],
                'quantity' => $request->quantity
            ]
        );
        return redirect()->route('panier.index');
    }

    public function destroy(Request $request)
    {
        Cart::remove($request->id);
        return redirect()->route('panier.index');
    }
}
