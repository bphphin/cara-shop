<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\BrandRequest;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::paginate(6);
//        $brands = Brand::all();
        return view('admin.pages.brands.index', compact('brands'));
    }

    public function trash()
    {
        $brands = Brand::onlyTrashed()->get();
        return view('admin.pages.brands.trash-list', compact('brands'));
    }

    public function create()
    {
        return view('admin.pages.brands.create-form');
    }

    public function store(BrandRequest $request)
    {
        $isSuccess = Brand::create([
            'name' => $request->name,
            'slug' => $request->slug ?? '',
            'description' => $request->description ?? '',
        ]);
        return checkEndDisplayMsg($isSuccess,'success','Success','Thêm mới thành công','admin.brand.index');
    }

    public function edit($id)
    {
        $brand = Brand::find($id);
        return view('admin.pages.brands.edit-form', compact('brand'));
    }

    public function update(Request $request,$id){
        $isSuccess = Brand::where('id',$id)->update([
            'name' => $request->name,
            'slug' => $request->slug ?? '',
            'description' => $request->description ?? ''
        ]);
        return checkEndDisplayMsg($isSuccess,'success','Success','Cập nhật thành công','admin.brand.index');
    }

    public function softDelete($id)
    {
        $isSuccess = Brand::destroy($id);
        return checkEndDisplayMsg($isSuccess,'success','Success','Xóa thành công','admin.brand.index');

    }

    public function restore($id)
    {
        $isSuccess = Brand::onlyTrashed()->whereId($id)->restore();
        return checkEndDisplayMsg($isSuccess,'success','Success','Hoàn tác thành công','admin.brand.index');

    }

    public function destroy($id)
    {
        $isSuccess = Brand::whereId($id)->forceDelete();
        return checkEndDisplayMsg($isSuccess,'success','Success','Xóa thành công','admin.brand.trash');

    }

}
