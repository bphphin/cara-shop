<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\CategoryRequest;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryController extends Controller
{
    public function index()
    {
        $cates = Category::all();
        return view('admin.pages.categories.index', compact('cates'));
    }

    public function trash()
    {
        $cates = Category::onlyTrashed()->get();
        return view('admin.pages.categories.trash-list', compact('cates'));
    }

    public function create()
    {
        return view('admin.pages.categories.create-form');
    }

    public function store(CategoryRequest $request)
    {
        $isSuccess = Category::create([
            'name' => $request->name,
            'slug' => $request->slug ?? '',
            'description' => $request->description ?? ''
        ]);
         return checkEndDisplayMsg($isSuccess,'success','Success','Thêm mới thành công','admin.category.index');
    }

    public function restore($id) {
        $isSuccess = Category::onlyTrashed()->whereId($id)->restore();
        return checkEndDisplayMsg($isSuccess,'success','Success','Hoàn tác thành công','admin.category.trash');
    }
    public function softDelete($id)
    {
        $isSuccess = Category::destroy($id);
        return checkEndDisplayMsg($isSuccess,'success','Thành công','Xóa thành công','admin.category.index');

    }

    public function destroy($id)
    {
        $isSuccess = Category::whereId($id)->forceDelete();
//        if($isSuccess) {
//            $title = 'Remove Category';
//            $text = 'Bạn có muốn xóa không??';
//            confirmDelete($title,$text);
//        }
//        return redirect()->route('admin.category.trash');
        return checkEndDisplayMsg($isSuccess,'success','Thành công','Xóa thành công','admin.category.trash');
    }
}
