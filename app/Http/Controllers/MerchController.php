<?php

namespace App\Http\Controllers;

use App\Models\MerchItem;
use Illuminate\Http\Request;

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
}
