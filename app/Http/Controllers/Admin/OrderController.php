<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index() {
        $orders = Order::all();
        // $orders = DB::table('orders')
        // ->leftJoin('order_details','order_details.order_id','=','orders.id')
        // ->leftJoin('products','products.id','=','order_details.pro_id')
        // ->leftJoin('brands','brands.id','=','products.brand_id')
        // ->leftJoin('sub_categories','sub_categories.id','=','products.cate_id')
        // ->select('orders.*','products.name as pro_name','brands.name as brand_name','sub_categories.name as cate_name',
        // 'order_details.price as order_price','order_details.quantity as order_quantity','order_details.total_price as order_total_price')
        // ->get();
        // dd($orders);
        return view('admin.pages.orders.index',compact('orders'));
    }
}
