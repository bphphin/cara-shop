<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rating;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{
    public function rating(Request $request)
    {
        $data = $request->all();
        if(Auth::check()) {
            $data['user_id'] = Auth::user()?->id;
        }
        $isSuccess = Rating::query()->create($data);
        if($isSuccess) {
            toast('Cảm ơn bạn đã đánh giá sản phẩm','success');
            return back();
        }
        toast('Có lỗi xảy ra, vui lòng kiểm tra lại','error');
        return back();
    }

    public function destroy(Rating $rating){
        $rating->delete();
        toast('Xóa bình luận thành công','success');
        return back();
    }
}
