<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Color;
use App\Models\Product;
use App\Models\Size;
use App\Models\StatusProduct;
use App\Models\SubCategory;
use Illuminate\Http\Request;
Use Alert;
use App\Http\Requests\Admin\ProductRequest;
use Illuminate\Support\Str;
class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(6);
        return view('admin.pages.products.index', compact('products'));
    }

    public function trash()
    {
        $products = Product::onlyTrashed()->paginate(6);
        return view('admin.pages.products.trash-list', compact('products'));
    }

    public function restore($id)
    {
        $isSuccess = Product::onlyTrashed()->whereId($id)->restore();
        return checkEndDisplayMsg($isSuccess, 'success', 'Thành công', 'Hoàn tác thành công', 'admin.product.index');
    }


    public function edit($id) {
        $product = Product::find($id);
        $colors = Color::all();
        $sizes = Size::all();
        $cates = SubCategory::all();
        $brands = Brand::all();
        $sttProduct = StatusProduct::all();
        return view('admin.pages.products.edit-form', compact('product', 'colors', 'sizes', 'cates', 'brands','sttProduct'));
    }

    public function update(ProductRequest $request, $id)
    {
        $product = Product::find($id);
        if ($request->method() === 'POST') {
            if ($request->hasFile('image')) {
                $originName = $request->file('image')->getClientOriginalName();
                $fileName = pathinfo($originName, PATHINFO_FILENAME);
                $extension = $request->file('image')->getClientOriginalExtension();
                $image = $fileName . '-' . time() . '.' . $extension;

                $isSuccess = Product::where('id', $id)->update([
                    'name' => $request->name,
                    'price' => $request->price,
                    'quantity' => $request->quantity,
                    'slug' => Str::slug($request->name),
                    'image' => $image ?? $product->image,
                    'cate_id' => $request->cate_id ?? $product->cate_id,
                    'brand_id' => $request->brand_id ?? $product->brand_id,
                    'color_id' => $request->color_id ?? $product->color_id,
                    'size_id' => $request->size_id ?? $product->size_id,
                    'status_id' => $request->status_id ?? $product->status_id,
                    'description' => $request->description,
                ]);
                return checkEndDisplayMsg($isSuccess, 'success', 'Thành công', 'Cập nhật thành công', 'admin.product.index');
            }
        }
    }


    public function create() {
        $brands = Brand::all();
        $cates = SubCategory::all();
        $colors = Color::all();
        $sizes = Size::all();
        $sttProduct = StatusProduct::all();
        return view('admin.pages.products.create-form', [
            'brands' => $brands,
            'cates' => $cates,
            'colors' => $colors,
            'sizes' => $sizes,
            'sttProduct' => $sttProduct
        ]);
    }

    public function store(ProductRequest $request)
    {
        if ($request->method() === 'POST') {
            if ($request->hasFile('image')) {
                $originName = $request->file('image')->getClientOriginalName();
                $fileName = pathinfo($originName, PATHINFO_FILENAME);
                $extension = $request->file('image')->getClientOriginalExtension();
                $image = $fileName . '-' . time() . '.' . $extension;
                $request->file('image')->move(public_path('upload'), $image);

                $isSuccess = Product::create([
                    'name' => $request->name,
                    'price' => $request->price,
                    'quantity' => $request->quantity,
                    'slug' => Str::slug($request->name),
                    'image' => $image,
                    'cate_id' => $request->cate_id,
                    'brand_id' => $request->brand_id,
                    'color_id' => $request->color_id,
                    'size_id' => $request->size_id,
                    'status_id' => $request->status_id,
                    'description' => $request->description,
                ]);
                return checkEndDisplayMsg($isSuccess, 'success', 'Thành công', 'Thêm mới thành công', 'admin.product.index');
            }

        }
    }


    public function softDelete($id)
    {
        $isSuccess = Product::destroy($id);
        return checkEndDisplayMsg($isSuccess, 'success', 'Thành công', 'Xóa thành công', 'admin.product.index');
    }

    public function destroy($id) {
        $isSuccess = Product::whereId($id)->forceDelete();
        return checkEndDisplayMsg($isSuccess,'success','Thành công','Xóa thành công','admin.product.index');
    }
}
