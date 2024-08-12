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
}
