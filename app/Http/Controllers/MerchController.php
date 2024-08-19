<?php

namespace App\Http\Controllers;

use App\Models\MerchItem;
use Illuminate\Http\Request;
use Session;

class MerchController extends Controller
{
    public function index()
    {
        $merch = MerchItem::all();
        return view('Market Place', compact('merch'));
    }

    public function show($id)
    {
        $item = MerchItem::findOrFail($id);  // Fetches the item or throws a 404 if not found
        return view('Details', compact('item'));  // Passes the item to the view
    }

    public function addToCart(Request $request, $id)
    {
    \Log::info('Adding to cart item ID: ' . $id);  // Log item ID to debug

    $item = MerchItem::findOrFail($id);
    \Log::info('Item found: ' . $item->title);  // Confirm item is found

    $cart = session()->get('cart', []);
    \Log::info('Current Cart: ' . json_encode($cart));  // Log current cart state
    \Log::info('Session Value', ['id' => session()->getId(), 'data' => session()->all()]);

    if(isset($cart[$id])) {
        $cart[$id]['quantity']++;
    } else {
        $cart[$id] = [
            "name" => $item->title,
            "price" => $item->price,
            "quantity" => 1
        ];
    }

    session()->put('cart', $cart);
    \Log::info('Updated Cart: ' . json_encode($cart));  // Log updated cart state

    return redirect()->back()->with('success', 'Product added to cart successfully!')
              ->header('Cache-Control', 'no-store, no-cache, must-revalidate, post-check=0, pre-check=0');

}
    public function clearCart()
    {
        session()->forget('cart');
        return redirect()->back()->with('success', 'Cart has been cleared!');
    }
}
