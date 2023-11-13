<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeCategoryController extends Controller
{
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
}
