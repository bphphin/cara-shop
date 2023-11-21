<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Alert;
use App\Mail\OrderMail;
use App\Models\Order;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CartController extends Controller
{
    // Cart
    public function cart()
    {
        if (Auth::check()) {
            $userId = Auth::user()->id;
            $carts = DB::table('carts')
                ->leftJoin('users', 'users.id', '=', 'carts.user_id')
                ->leftJoin('products', 'products.id', '=', 'carts.pro_id')
                ->leftJoin('sizes', 'sizes.id', '=', 'carts.size_id')
                ->where('user_id', '=', $userId)
                ->select('carts.*', 'products.id as pro_id', 'products.name as proName', 'products.image', 'users.name as username')->get();
            return view('clients.pages.cart', compact('carts'));
        }
        return back();
    }

    //Add to cart

    public function addToCart(Request $request)
    {
        if (!$request->has('pro_id')) {
            toast()->error('Lỗi');
            return back();
        }
        if (Auth::check()) {
            if (Auth::user()->role !== 1) {
                $proId = $request->get('pro_id');
                $productToCart = Product::find($proId);
                if ($request->quantity > $productToCart->quantity) {
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
                    return checkEndDisplayMsg($isSuccess, 'success', 'Thành công', 'Thêm giỏ hàng thành công', 'home.cart');
                } catch (\Throwable $th) {
                    return $th->getMessage();
                }
            }
            return back();
        }
        return back();
    }

    //Update cart
    public function updateCart(Request $request)
    {
        if (Auth::check()) {
            if (Auth::user()->role !== 1) {
                if ($request->has('id') && $request->has('pro_id')) {
                    $cartId = $request->get('id');
                    $proId = $request->get('pro_id');
                    $quantityByProduct = Product::find($proId);

                    if ($request->quantity <= 0) {
                        Cart::destroy($cartId);
                        return back();
                    }
                    if ($request->quantity > $quantityByProduct->quantity) {
                        toast('Cập nhật không thành công', 'warning');
                        return back();
                    }
                    try {
                        // dd(2);
                        Cart::where('id', $cartId)->update([
                            'quantity' => $request->quantity
                        ]);
                        toast('Cập nhật thành công', 'success');
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
    public function destroy($id)
    {
        try {
            $isSuccess = Cart::destroy($id);
            return checkEndDisplayMsg($isSuccess, 'success', 'Thành công', 'Xóa sản phẩm thành công', 'home.cart');
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    // Check out

    public function checkout()
    {
        if (Auth::check()) {
            $userId = Auth::user()->id;
            $carts = DB::table('carts')
                ->leftJoin('users', 'users.id', '=', 'carts.user_id')
                ->leftJoin('products', 'products.id', '=', 'carts.pro_id')
                ->leftJoin('sizes', 'sizes.id', '=', 'carts.size_id')
                ->where('user_id', '=', $userId)
                ->select('carts.*', 'products.id as pro_id', 'products.name as proName', 'products.image', 'users.name as username')->get();
            return view('clients.pages.orders.checkout', compact('carts'));
        }
        return back();
    }

    public function checkoutStep()
    {
        $stripe = new \Stripe\StripeClient('sk_test_51OCaeXJEiz1nZ8wauNXZTuCnNk3n6JOPOeucvWgKw0mYqTY6UswavZHHhoa9PKzzz02KnfRVrAPq4vAPAWgWuNls002uS07q7Z');
        $line_items = [];
        $carts = DB::table('carts')
            ->leftJoin('users', 'users.id', '=', 'carts.user_id')
            ->leftJoin('products', 'products.id', '=', 'carts.pro_id')
            ->leftJoin('sizes', 'sizes.id', '=', 'carts.size_id')
            ->where('user_id', '=', auth()->user() ?->id)
            ->select('carts.*', 'products.id as pro_id', 'products.name as proName', 'products.image', 'users.name as username')->get();
        foreach ($carts as $item) {
            $line_items[] = [
                'price_data' => [
                    'currency' => 'vnd',
                    'product_data' => [
                        'name' => $item->proName,
                        'images' => [$item->image]
                    ],
                    'unit_amount' => $item->price,
                ],
                'quantity' => $item->quantity,
            ];
        }

        $session = $stripe->checkout->sessions->create([
            'line_items' => $line_items,
            'mode' => 'payment',
            'success_url' => route('order-success'),
            'cancel_url' => route('home.cart'),
        ]);
        return redirect($session->url);
    }

    //Complete checkout
    public function success(Request $request)
    {
//        $stripe = new \Stripe\StripeClient('sk_test_51OCaeXJEiz1nZ8wauNXZTuCnNk3n6JOPOeucvWgKw0mYqTY6UswavZHHhoa9PKzzz02KnfRVrAPq4vAPAWgWuNls002uS07q7Z');
//        $customer = null;
//        try {
//            $session = $stripe->checkout->sessions->retrieve($request->get('session_id'));
//            if (!$session) {
//                throw new NotFoundHttpException;
//            }
//            $customer = $stripe->customers->retrieve($session->customer);
//            return view('clients.pages.orders.order-success', compact('customer'));
//        } catch (\Exception $e) {
//            dd($e->getMessage());
//        }
        $order = new Order();
        $carts = Cart::all();
        $user_id = Auth::user()->id;
        $user = User::find($user_id);
        $order->user_id = $user_id;
        $order->username = $user->name;
        $order->address = $user->address;
        $order->phone = $user->phone;
        $order->save();

        foreach ($carts as $item) {
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
        Mail::to(Auth::user()->email)->send(new OrderMail());
    }
}
