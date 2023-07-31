<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Size;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    // trang chủ
    public function home() {
        $products = Product::limit(20)->get();
        return view('clients.pages.home',compact('products'));
    }


    // detail product
    public function showProduct($id,$slug) {
        $product = Product::find($id);
        $sizes = Size::all();
        return view('clients.pages.detail-product',compact('product','sizes'));
    }


    // route shop-page
    public function shop() {
        $products = Product::paginate(4);
        $cates = Category::all();
        return view('clients.pages.shop',compact('products','cates'));
    }

    public function detailCate($id) {
        $subCate = SubCategory::where('parent_id','=',$id)->get();
        $productToCate = DB::table('categories')
            ->leftJoin('sub_categories','sub_categories.parent_id','=','categories.id')
            ->leftJoin('products','products.cate_id','=','sub_categories.id')
            ->where('parent_id','=',$id)
            ->select('sub_categories.name as subCateName','categories.name as cateName','products.*')
            ->limit(4)->get();
//        dd($productToCate);
        return view('clients.pages.detail-category',compact('subCate','productToCate'));
    }
}
