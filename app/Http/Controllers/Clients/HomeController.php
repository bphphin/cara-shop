<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function home() {
        $products = Product::limit(20)->get();
        return view('clients.pages.home',compact('products'));
    }

    public function showProduct($id,$slug) {
        $product = Product::find($id);
        $sizes = Size::all();
        return view('clients.pages.detail',compact('product','sizes'));
    }
}
