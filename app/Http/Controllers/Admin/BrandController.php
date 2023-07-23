<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\BrandRequest;
class BrandController extends Controller
{
    public function index() {
//        $brands = Brand::paginate(6);
        $brands = Brand::all();
        return view('admin.pages.brands.index',compact('brands'));
    }

    public function trash() {
        $brands = Brand::onlyTrashed();
        return view('admin.pages.brands.trash-list',compact('brands'));
    }

    public function create() {
        return view('admin.pages.brands.create-form');
    }

    public function store(BrandRequest $request) {
        $isSuccess = Brand::create([
            'name' => $request->name,
            'slug' => $request->slug ?? '',
            'description' => $request->description ?? '',
        ]);
        if($isSuccess) {
            return redirect()->route('admin.brand.index');
        }
        return back()->withErrors('fail','Thêm mới không thành công');
    }
}
