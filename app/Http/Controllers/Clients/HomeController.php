<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use App\Models\Size;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    // trang chủ
    public function home() {
        $use_id = Auth::user()->id;
        $carts = DB::table('carts')
            ->leftJoin('users','users.id','=','carts.user_id')
            ->leftJoin('products','products.id','=','carts.pro_id')
            ->leftJoin('sizes','sizes.id','=','carts.size_id')
            ->where('user_id','=',$use_id)
            ->select('carts.*','products.id as pro_id','products.name as proName','products.image','users.name as username')->get();
        $products = Product::limit(20)->get();
        return view('clients.pages.home',compact('products','carts'));
    }

}
