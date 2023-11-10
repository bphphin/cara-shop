<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index() {
        $customers = User::paginate(5);
        return view('admin.pages.customers.index',compact('customers'));
    }


    public function update(Request $request,$id) {
        $customer = User::find($id);
        $roles = [
            'Người dùng',
            'Quản trị viên'
        ];
        if($request->method() === 'POST') {
            $isSuccess = User::where('id',$id)->update([
                'role' => $request->role
            ]);
            return checkEndDisplayMsg($isSuccess,'success','Success','Cập nhật thông tin thành công','admin.customer.index');
        }
        return view('admin.pages.customers.edit-form',['customer' => $customer,'roles' => $roles]);
    }
}
