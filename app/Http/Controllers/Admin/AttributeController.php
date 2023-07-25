<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Size;
use Illuminate\Http\Request;

class AttributeController extends Controller
{
    public function index() {
        $sizes = Size::all();
        return view('admin.pages.attributes.index')->with('sizes',$sizes);
    }

}
