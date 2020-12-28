<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Cart;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('uid', Auth::user()->id)->get();
        return view('profile/orders', compact('orders'));
    }

    public function store(Request $request)
    {
        $finallyPrice = 0;
        $items = Cart::getContent();
        foreach ($items as $item) {
            $finallyPrice += $item->attributes[4];
        }

        $order = new Order();
        $order->articles = $request->get('articles');
        $order->status = "impayer";
        $order->price = $finallyPrice;
        $order->uid = Auth::user()->id;
        $order->address = $request->get('address');
        $order->city = $request->get('city');
        $order->zip = intval($request->get('zip'));
        $order->country = $request->get('country');
        $order->firstname = $request->get('firstname');
        $order->lastname = $request->get('lastname');
        $order->created_at = date('Y-m-d H:i:s');
        $order->updated_at = date('Y-m-d H:i:s');

        $order->save();

        return redirect()->route('orders.index');
    }

}
