<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\CategoryRequest;
use Illuminate\Support\Str;
class CategoryController extends Controller
{
    public function index()
    {
        $cates = Category::paginate(6);
        $subCates = SubCategory::all();
        return view('admin.pages.categories.index',['cates' => $cates,'subCates' => $subCates]);
    }

    public function trash()
    {
        $cates = Category::onlyTrashed()->paginate(5);
        return view('admin.pages.categories.trash-list', compact('cates'));
    }


    public function store(CategoryRequest $request)
    {
        if($request->method() === 'POST') {
            $isSuccess = Category::create([
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'description' => $request->description ?? ''
            ]);
            return checkEndDisplayMsg($isSuccess, 'success', 'Success', 'Thêm mới thành công', 'admin.category.index');
        }
        return view('admin.pages.categories.create-form');
    }

    public function restore($id)
    {
        $isSuccess = Category::onlyTrashed()->whereId($id)->restore();
        return checkEndDisplayMsg($isSuccess, 'success', 'Success', 'Hoàn tác thành công', 'admin.category.trash');
    }

    public function update(Request $request,$id) {
        $cate = Category::find($id);
        if ($request->method() === 'POST') {
            $isSuccess = Category::where('id', $id)->update([
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'description' => $request->description ?? ''
            ]);
            return checkEndDisplayMsg($isSuccess, 'success', 'Success', 'Cập nhật thành công', 'admin.category.index');
        }
        return view('admin.pages.categories.edit-form', compact('cate'));
    }

    public function softDelete($id)
    {
        $isSuccess = Category::destroy($id);
        return checkEndDisplayMsg($isSuccess, 'success', 'Thành công', 'Xóa thành công', 'admin.category.index');
    }

    public function destroy($id)
    {
        $isSuccess = Category::whereId($id)->forceDelete();
        return checkEndDisplayMsg($isSuccess, 'success', 'Thành công', 'Xóa thành công', 'admin.category.trash');
    }
}
