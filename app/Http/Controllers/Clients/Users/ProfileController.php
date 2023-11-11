<?php

namespace App\Http\Controllers\Clients\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class ProfileController extends Controller
{
    public function profile(Request $request)
    {
        if ($request->getMethod() === 'POST') {

            $data = $request->except(['_token','avatar']);
            if($request->hasFile('avatar')) {
                $data['avatar'] = Cloudinary::upload($request->file('avatar')->getRealPath(),array(
                    'folder' => 'Cara/Profile',
                    'overwrite' => TRUE,
                    'resource_type' => 'image'
                ))->getSecurePath();
            }
            User::where('id',Auth::user()?->id)->update($data);
            toast('Cập nhật tài khoản thành công', 'success');
            return back();
        }
        return view('clients.pages.users.profile');
    }

}
