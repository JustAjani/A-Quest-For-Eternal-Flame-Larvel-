<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\StripeClient;
use App\Models\MerchItem; 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\StripeClient;
use App\Models\MerchItem; // Adjusted to use MerchItem model

class StripePaymentController extends Controller
{
    public function createSession(Request $request)
    {
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $merchItem = MerchItem::findOrFail($request->merchItemId); // Ensure the correct item ID is passed

        // $stripe = new StripeClient(env('STRIPE_SECRET'));

        $session =\Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'usd',
                        'product_data' => [
                            'name' => $merchItem->title,
                        ],
                        'unit_amount' => $merchItem->price, // Price in cents
                    ],
                    'quantity' => 1,
                ],
            ],
            'mode' => 'payment',
            'success_url' => route('success'),
            'cancel_url' => route('cancel'),
        ]);

        return redirect($session->url);
    }
}
