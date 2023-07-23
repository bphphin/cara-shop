<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() {
        $cates = Category::all();
        return view('admin.pages.categories.index',compact('cates'));
    }

    public function trash() {
        $cates = Category::onlyTrashed()->get();
        return view('admin.pages.categories.trash-list',compact('cates'));
    }

    public function create() {
    }
}
