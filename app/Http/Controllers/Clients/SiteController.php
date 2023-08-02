<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Size;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Alert;
use App\Models\Cart;
use Illuminate\Support\Facades\Session;

class SiteController extends Controller
{
    // detail product
    public function showProduct($id, $slug)
    {
        $product = Product::find($id);
        $sizes = Size::all();
        return view('clients.pages.detail-product', compact('product', 'sizes'));
    }


    // shop-page
    public function shop()
    {
        $products = Product::paginate(4);
        $cates = Category::all();
        return view('clients.pages.shop', compact('products', 'cates'));
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
//        dd($productToCate);
        return view('clients.pages.detail-category', compact('subCate', 'productToCate'));
    }

    // product from sub cate
    public function productFromSubCate($id)
    {
        $subCate = SubCategory::all();
        $proFromSubCate = Product::where('cate_id', '=', $id)->get();
        return view('clients.pages.detail-pro-from-subcate', compact('proFromSubCate', 'subCate'));
    }

    //search product
    public function searchProductHome(Request $request)
    {
        $name = $request->name;
        $subCate = SubCategory::all();
        $productBySearch = Product::where('name','LIKE',"%$name%")->get();
        return view('clients.pages.view-product-search',compact('productBySearch','subCate'));
    }

    // Cart
    public function cart() {
        return view('clients.pages.cart');
    }

    //Add to cart

    public function addToCart(Request $request) {
        if(!$request->has('pro_id')) {
            toast()->error('Lỗi');
            return back();
        }
        $proId = $request->get('pro_id');
        $productToCart = Product::find($proId);
        if($request->quantity > $productToCart->quantity) {
            toast()->error('Số lượng sản phẩm không hợp lệ');
            return back();
        }
        try {
            $isSuccess = Cart::create([
                'pro_id' => $proId,
                'user_id' => Auth::user()->id,
                'size_id' => $request->size_id,
                'price' => $productToCart->price,
                'quantity' => $request->quantity,
                'total_price' => ($productToCart->price * $request->quantity)
            ]);
            return checkEndDisplayMsg($isSuccess,'success','Thành công','Thêm giỏ hàng thành công','site.cart');
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
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
