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
        if ($isSuccess) {
//            alert()->flash('Tạo mới thành công','success');
            toastr()->success('Thêm mới thành công', 'success');
            return redirect()->route('admin.brand.index');
        }
        return back()->withErrors('fail', 'Thêm mới không thành công');
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
        if ($isSuccess) {
            toastr()->success('Cập nhật thành công', 'success');
            return redirect()->route('admin.brand.index');
        }
    }

    public function softDelete($id)
    {
//        $isSuccess = Brand::whereId($id)->forceDelete();
        $isSuccess = Brand::destroy($id);
        if ($isSuccess) {
            toastr()->success('Xóa thành công', 'success');
            return redirect()->route('admin.brand.index');
        }
    }

    public function restore($id)
    {
        $isSuccess = Brand::onlyTrashed()->whereId($id)->restore();
        if ($isSuccess) {
            toastr()->success('Cập nhật thành công', 'success');
            return redirect()->route('admin.brand.index');
        }
    }

    public function destroy($id)
    {
        $isSuccess = Brand::whereId($id)->forceDelete();
        if ($isSuccess) {
            toastr()->success('Xóa thành công', 'success');
            return redirect()->route('admin.brand.index');
        }
    }

}
