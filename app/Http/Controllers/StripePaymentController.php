<?php

namespace App\Http\Controllers;

use Stripe\Stripe;
use Stripe\Checkout\Session;
use Illuminate\Http\Request;

class StripePaymentController extends Controller
{
    public function createSession(Request $request)
    {
        try {
            Stripe::setApiKey(env('STRIPE_SECRET'));

            // Assuming $cart is correctly populated
            $cart = session('cart');
            $line_items = [];

            foreach ($cart as $id => $details) {
                $line_items[] = [
                    'price_data' => [
                        'currency' => 'usd',
                        'product_data' => ['name' => $details['name']],
                        'unit_amount' => $details['price'] * 100, // convert to cents
                    ],
                    'quantity' => $details['quantity'],
                ];
            }

            $session = Session::create([
                'payment_method_types' => ['card'],
                'line_items' => $line_items,
                'mode' => 'payment',
                'success_url' => route('checkout.success'),
                'cancel_url' => route('checkout.cancel'),
            ]);

            return response()->json(['id' => $session->id]);
        } catch (\Exception $e) {
            \Log::error("Error creating Stripe session: " . $e->getMessage());
            return response()->json(['error' => 'An error occurred while creating the payment session.'], 500);
        }
    }
}
