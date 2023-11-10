<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Color;
use App\Models\Product;
use App\Models\Size;
use App\Models\StatusProduct;
use App\Models\SubCategory;
use Alert;
use App\Http\Requests\Admin\ProductRequest;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
class ProductController extends Controller
{

    private const PATH_UPLOAD = 'admin/products';

    public function index()
    {
        $products = Product::latest()->paginate(6);
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

    public function store(ProductRequest $request)
    {
        $brands = Brand::all();
        $cates = SubCategory::all();
        $colors = Color::all();
        $sizes = Size::all();
        $sttProduct = StatusProduct::all();
        if ($request->method() === 'POST') {

            $data = $request->except('image');

            if($request->hasFile('image')) {
                $data['image'] = Cloudinary::upload($request->file('image')->getRealPath(),array(
                    'folder' => 'Cara/Products',
                    'overwrite' => TRUE,
                    'resource_type' => 'image'
                ))->getSecurePath();
            }
            $isSuccess = Product::create($data);
            if(!$isSuccess) {
                $publicId = $this->getPublicId($data['image']);
                Cloudinary::destroy($publicId);
            }
            return checkEndDisplayMsg($isSuccess, 'success', 'Thành công', 'Thêm mới thành công', 'admin.product.index');
        }
        return view('admin.pages.products.create-form', [
            'brands' => $brands,
            'cates' => $cates,
            'colors' => $colors,
            'sizes' => $sizes,
            'sttProduct' => $sttProduct
        ]);
    }

    public function update(ProductRequest $request, $id)
    {
        $product = Product::find($id);
        $colors = Color::all();
        $sizes = Size::all();
        $cates = SubCategory::all();
        $brands = Brand::all();
        $sttProduct = StatusProduct::all();
        if ($request->method() === 'POST') {

            $data = $request->except(['_token','image']);

            if($request->hasFile('image')) {
                $data['image'] = $data['image'] = Cloudinary::upload($request->file('image')->getRealPath(),array(
                    'folder' => 'Cara/Products',
                    'overwrite' => TRUE,
                    'resource_type' => 'image'
                ))->getSecurePath();
            }

            $isSuccess = Product::where('id', $id)->update($data);

            if(!$isSuccess) {
                $publicId = $this->getPublicId($data['image']);
                Cloudinary::destroy($publicId);
            }

            return checkEndDisplayMsg($isSuccess, 'success', 'Thành công', 'Cập nhật thành công', 'admin.product.index');
        }
        return view('admin.pages.products.edit-form', compact('product', 'colors', 'sizes', 'cates', 'brands', 'sttProduct'));
    }

    public function softDelete($id)
    {
        $isSuccess = Product::destroy($id);
        return checkEndDisplayMsg($isSuccess, 'success', 'Thành công', 'Xóa thành công', 'admin.product.index');
    }

    public function destroy($id)
    {
        $isSuccess = Product::whereId($id)->forceDelete();
        return checkEndDisplayMsg($isSuccess, 'success', 'Thành công', 'Xóa thành công', 'admin.product.index');
    }
}
