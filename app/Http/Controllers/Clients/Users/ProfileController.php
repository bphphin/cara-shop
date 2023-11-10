<?php

namespace App\Http\Controllers\Clients\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function profile() {
        return view('clients.pages.users.profile');
    }

    public function update(Request $request) {
        if($request->has('id')) {
            $user_id = $request->id;
            $userDefault = User::find($user_id);
            try {
                $originName = $request->file('avatar')->getClientOriginalName();
                $fileName = pathinfo($originName,PATHINFO_FILENAME);
                $extension = $request->file('avatar')->getClientOriginalExtension();
                $avatar = $fileName . '-' . time() . '.' . $extension;
                $request->file('avatar')->move('upload/',$avatar);
                User::where('id',$user_id)->update([
                    'name' => $request->name ?? $userDefault->name,
                    'email' => $request->email ?? $userDefault->email,
                    'phone' => $request->phone ?? $userDefault->phone,
                    'address' => $request->address ?? $userDefault->address,
                    'avatar' => $avatar ?? $userDefault->avatar,
                ]);
                toast('Cập nhật tài khoản thành công','success');
                return back();
            } catch (\Throwable $th) {
                return $th->getMessage();
            }
        }
        toast('Có lỗi xảy ra, vui lòng thử lại','error');
        return back();
    }
}
