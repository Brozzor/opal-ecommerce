<?php

namespace App\Http\Controllers;

use Stripe\Stripe;
use Stripe\Webhook;
use Stripe\Checkout\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use Cart;

class CheckoutController extends Controller
{
    public function index(Request $request)
    {
        Stripe::setApiKey('sk_test_51D3YQjCyr3LKJht0OBQHaTj1loKaHy5o8El1NK3BHTwZhffclg193oPVt0NCjcAtjfQt4l0go379sVJD4GRgGwcP00og7GKmwy');

        $finallyPrice = 0;
        $items = Cart::getContent();
        foreach ($items as $item) {
            $finallyPrice += ($item->attributes[4] * $item->quantity);
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
                    'unit_amount' => $finallyPrice * 100,
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

    public function edit(Request $request)
    {
        //Stripe::setApiKey('sk_test_51D3YQjCyr3LKJht0OBQHaTj1loKaHy5o8El1NK3BHTwZhffclg193oPVt0NCjcAtjfQt4l0go379sVJD4GRgGwcP00og7GKmwy');
        Stripe::setApiKey('pk_test_D4eqTbqTbXHUCPtqrLGdH0aa');
        $endpoint_secret = "whsec_GPgvKimw0sf5DnSPxbZAP8uK9f9nzAc9";

        $payload = @file_get_contents('php://input');
        $sig_header = $_SERVER['HTTP_STRIPE_SIGNATURE'];
        $event = null;

        try {
            $event = Webhook::constructEvent(
                $payload, $sig_header, $endpoint_secret
            );
        } catch(\UnexpectedValueException $e) {
            // Invalid payload
            http_response_code(400);
            exit();
        } catch(\Stripe\Exception\SignatureVerificationException $e) {
            // Invalid signature
            http_response_code(400);
            exit();
        }
        if ($event->type == "checkout.session.completed"){
            $session = $event->data->object;
            $order = Order::find($session->client_reference_id);
            if ($order){
                $order->status = "payer";
                $order->updated_at = date('Y-m-d H:i:s');
                $order->save();
            }
            http_response_code(200);
            
        }
    }

}
