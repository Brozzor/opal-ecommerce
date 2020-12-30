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

        $finallyPrice = 0;
        foreach ($items as $item) {
            $finallyPrice += ($item->attributes[4] * $item->quantity);
        }
        return view('cart')->with('items',$items)->with('finallyPrice', $finallyPrice);
    }

    public function store(Request $request)
    {
        $article = Article::findOrFail($request->id);

        Cart::add(
            [
                'id' => $article->id,
                'name' => $article->name,
                'price' => $article->price,
                'attributes' => [$article->color, $article->brand, $article->genre,$article->imgLink, $article->price],
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
