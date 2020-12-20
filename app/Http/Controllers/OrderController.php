<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('uid', Auth::user()->id)->get();
        return view('profile/orders', compact('orders'));
    }
}