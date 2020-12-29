<?php

namespace App\Http\Controllers;

use Stripe\Stripe;
use Stripe\Checkout\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use Cart;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        Stripe::setApiKey('sk_test_51D3YQjCyr3LKJht0OBQHaTj1loKaHy5o8El1NK3BHTwZhffclg193oPVt0NCjcAtjfQt4l0go379sVJD4GRgGwcP00og7GKmwy');

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

        $domain = "https://opal-ecommerce.herokuapp.com";
        $checkout_session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'eur',
                    'unit_amount' => $finallyPrice*100,
                    'product_data' => [
                        'name' => "Opal commande n° $order->id"
                    ],
                ],
                'quantity' => 1,
            ]],
            "client_reference_id" => $order->id,
            'mode' => 'payment',
            'success_url' => $domain . '/orders',
            'cancel_url' => $domain . '/panier',
        ]);
        echo json_encode(['id' => $checkout_session->id]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
