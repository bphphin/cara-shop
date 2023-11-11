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

class SiteController extends Controller
{
    // detail product
    public function showProduct($id, $slug,Request $request)
    {
        if($request->has('cate')) {
            $cate_id = $request->get('cate');
            $similarProductByCate = Product::where('cate_id','=',$cate_id)->where('id','<>',$id)->limit(4)->get();
            $product = Product::find($id);
            $sizes = Size::all();
            return view('clients.pages.detail-product', compact('product', 'sizes','similarProductByCate'));
        }
        toast('Lỗi','error');
        return back();
    }


    // shop-page
    public function shop()
    {
        $products = Product::paginate(4);
        $cates = Category::all();
        $carts = DB::table('carts')
            ->leftJoin('users','users.id','=','carts.user_id')
            ->leftJoin('products','products.id','=','carts.pro_id')
            ->leftJoin('sizes','sizes.id','=','carts.size_id')
            ->where('user_id','=',Auth::user()?->id)
            ->select('carts.*','products.id as pro_id','products.name as proName','products.image','users.name as username')->get();
        return view('clients.pages.shop', compact('products', 'cates','carts'));
    }

    // detail cate end display product default from category
    public function detailCate($id)
    {
        $subCate = SubCategory::where('parent_id', '=', $id)->get();
        $productToCate = DB::table('categories')
            ->leftJoin('sub_categories', 'sub_categories.parent_id', '=', 'categories.id')
            ->leftJoin('products', 'products.cate_id', '=', 'sub_categories.id')
            ->where('parent_id', '=', $id)
            ->select('sub_categories.name as subCateName', 'categories.name as cateName', 'products.*')
            ->limit(4)->get();
        $carts = DB::table('carts')
            ->leftJoin('users','users.id','=','carts.user_id')
            ->leftJoin('products','products.id','=','carts.pro_id')
            ->leftJoin('sizes','sizes.id','=','carts.size_id')
            ->where('user_id','=',Auth::user()?->id)
            ->select('carts.*','products.id as pro_id','products.name as proName','products.image','users.name as username')->get();
        return view('clients.pages.detail-category', compact('subCate', 'productToCate','carts'));
    }

    // product from sub cate
    public function productFromSubCate($id)
    {
        $subCate = SubCategory::all();
        $proFromSubCate = Product::where('cate_id', '=', $id)->get();
        $carts = DB::table('carts')
            ->leftJoin('users','users.id','=','carts.user_id')
            ->leftJoin('products','products.id','=','carts.pro_id')
            ->leftJoin('sizes','sizes.id','=','carts.size_id')
            ->where('user_id','=',Auth::user()?->id)
            ->select('carts.*','products.id as pro_id','products.name as proName','products.image','users.name as username')->get();
        return view('clients.pages.detail-pro-from-subcate', compact('proFromSubCate', 'subCate','carts'));
    }

    //search product
    public function searchProductHome(Request $request)
    {
        $name = $request->name;
        $subCate = SubCategory::all();
        $productBySearch = Product::where('name','LIKE',"%$name%")->get();
        return view('clients.pages.view-product-search',compact('productBySearch','subCate'));
    }

    // About Page
    public function about() {
        return view('clients.pages.about');
    }

    //Blog Page
    public function blog() {
        return view('clients.pages.blog');
    }

    //Contact Page
    public function contact() {
        return view('clients.pages.contact');
    }

}
