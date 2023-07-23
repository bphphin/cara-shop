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
}
