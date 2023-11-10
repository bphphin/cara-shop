<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Alert;
use App\Mail\OrderMail;
use App\Models\Order;
use Illuminate\Support\Facades\Mail;

class CartController extends Controller
{
    // Cart
    public function cart() {
        if(Auth::check()) {
            $userId = Auth::user()->id;
            $carts = DB::table('carts')
                ->leftJoin('users','users.id','=','carts.user_id')
                ->leftJoin('products','products.id','=','carts.pro_id')
                ->leftJoin('sizes','sizes.id','=','carts.size_id')
                ->where('user_id','=',$userId)
                ->select('carts.*','products.id as pro_id','products.name as proName','products.image','users.name as username')->get();
                return view('clients.pages.cart',compact('carts'));
        }
        return back();
    }

    //Add to cart

    public function addToCart(Request $request) {
        if(!$request->has('pro_id')) {
            toast()->error('Lỗi');
            return back();
        }
        if(Auth::check()) {
            if(Auth::user()->role !== 1) {
                $proId = $request->get('pro_id');
                $productToCart = Product::find($proId);
                if($request->quantity > $productToCart->quantity) {
                    toast()->error('Số lượng sản phẩm không hợp lệ');
                    return back();
                }
                try {
                    $isSuccess = Cart::create([
                        'pro_id' => $proId,
                        'user_id' => Auth::user()->id,
                        'size_id' => $request->size_id,
                        'price' => $productToCart->price,
                        'quantity' => $request->quantity,
                        'total_price' => ($productToCart->price * $request->quantity)
                    ]);
                    return checkEndDisplayMsg($isSuccess,'success','Thành công','Thêm giỏ hàng thành công','home.cart');
                } catch (\Throwable $th) {
                    return $th->getMessage();
                }
            }
            return back();
        }
        return back();
    }

    //Update cart
    public function updateCart(Request $request) {
        if(Auth::check()) {
            if(Auth::user()->role !== 1) {
                if($request->has('id') && $request->has('pro_id')) {
                    $cartId = $request->get('id');
                    $proId = $request->get('pro_id');
                    $quantityByProduct = Product::find($proId);

                    if($request->quantity <= 0) {
                        // dd(1);
                        Cart::destroy($cartId);
                        return back();
                    }
                    if($request->quantity > $quantityByProduct->quantity) {
                        toast('Cập nhật không thành công','warning');
                        return back();
                    }
                    try {
                        // dd(2);
                        Cart::where('id',$cartId)->update([
                            'quantity' => $request->quantity
                        ]);
                        toast('Cập nhật thành công','success');
                        return back();
                    } catch (\Throwable $th) {
                        return $th->getMessage();
                    }
                }
            }
            return back();
        }
        return back();
    }


    // Remove cart
    public function destroy($id) {
        try {
            $isSuccess = Cart::destroy($id);
            return checkEndDisplayMsg($isSuccess,'success','Thành công','Xóa sản phẩm thành công','home.cart');
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    // Check out

    public function checkout() {
        if(Auth::check()) {
            $userId = Auth::user()->id;
            $carts = DB::table('carts')
                ->leftJoin('users','users.id','=','carts.user_id')
                ->leftJoin('products','products.id','=','carts.pro_id')
                ->leftJoin('sizes','sizes.id','=','carts.size_id')
                ->where('user_id','=',$userId)
                ->select('carts.*','products.id as pro_id','products.name as proName','products.image','users.name as username')->get();
                return view('clients.pages.orders.checkout',compact('carts'));
        }
        return back();
    }

    // complete checkout
    public function completeCheckout(Request $request) {
        // dd($cart->all());
        if(Auth::check()) {
            try {
                $order = new Order();
                $carts = Cart::all();
                // dd($carts);
                $user_id = Auth::user()->id;
                $order->user_id = $user_id;
                $order->username = $request->username;
                $order->address = $request->address;
                $order->phone = $request->phone;
                $order->save();

                foreach($carts as $item) {
                    OrderDetail::create([
                        'order_id' => $order->id,
                        'pro_id' => $item->pro_id,
                        'price' => $item->price,
                        'quantity' => $item->quantity,
                        'total_price' => ($item->quantity * $item->price)
                    ]);
                    DB::statement("UPDATE products SET quantity = quantity - $item->quantity WHERE id = $item->pro_id");
                    Cart::destroy($item->id);
                }
                // Alert::success('Thành công', 'Mua hàng thành công');
                Mail::to(Auth::user()->email)->send(new OrderMail());
                return redirect()->route('home.cart.order');
            } catch (\Throwable $th) {
                return $th->getMessage();
            }
        }
        Alert::error('Không thành công');
        return back();
    }

}
