<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function store(Request $request) {
        if($request->method() === 'POST') {
            $request->validate([
                'name' => 'required',
                'code' => 'required'
            ],[
                'name.required' => 'Tên màu không được để trống',
                'code.required' => 'Mã màu không được để trống'
            ]);
            $isSuccess = Color::create([
                'name' => $request->name,
                'code' => $request->code ?? ''
            ]);
            return checkEndDisplayMsg($isSuccess,'success','Success','Thêm mới màu thành công','admin.att.index');
        }
        return view('admin.pages.attributes.colors.create-form');
    }

    public function update(Request $request,$id) {
        $color = Color::find($id);
        if($request->method() === 'POST') {
            $isSuccess = Color::where('id',$id)->update([
                'name' => $request->name,
                'code' => $request->code ?? ''
            ]);
            return checkEndDisplayMsg($isSuccess,'success','Success','Chỉnh sửa thành công','admin.att.index');
        }
        return view('admin.pages.attributes.colors.edit-form',compact('color'));
    }

    
}
