<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Color;
use App\Models\Product;
use App\Models\Size;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index() {
        return view('admin.pages.products.index');
    }

    public function store(Request $request) {
        $brands = Brand::all();
        $cates = SubCategory::all();
        $colors = Color::all();
        $sizes = Size::all();
        if($request->method() === 'POST') {
            if($request->hasFile('image')) {
                $originName = $request->file('image')->getClientOriginalName();
                $fileName = pathinfo($originName,PATHINFO_FILENAME);
                $extension = $request->file('image')->getClientOriginalExtension();
                $image = $fileName . '-' . time() . '.'. $extension;
                $request->file('image')->move(public_path('upload'),$image);
            }
            $isSuccess = Product::create([
                'name' => $request->name,
                'price' => $request->price,
                'quantity' => $request->quantity,
                'slug' => $request->slug,
                'image' => $image,
                'cate_id' => $request->cate_id,
                'brand_id' => $request->brand_id,
                'color_id' => $request->color_id,
                'size_id' => $request->size_id,
                'description' => $request->description,
            ]);
            return checkEndDisplayMsg($isSuccess,'success','Thành công','Thêm mới thành công','admin.product.index');
        }
        return view('admin.pages.products.create-form',[
            'brands' => $brands,
            'cates' => $cates,
            'colors' => $colors,
            'sizes' => $sizes
        ]);
    }
}
