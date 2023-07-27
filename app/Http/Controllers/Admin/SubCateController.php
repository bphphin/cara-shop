<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCateController extends Controller
{
    public function store(Request $request) {
        $cates = Category::all();
        if($request->method() === 'POST') {
//            dd($request->all());
            $isSuccess = SubCategory::create([
                'name' => $request->name,
                'slug' => $request->slug ?? '',
                'description' => $request->description ?? '',
                'parent_id' => $request->parent_id
            ]);
            return checkEndDisplayMsg($isSuccess,'success','Thành công','Thêm mới thành công','admin.category.index');
        }
        return view('admin.pages.categories.sub-cate.create-form',compact('cates'));
    }

    
}
