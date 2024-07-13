<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Services\Order\OrderServiceInterface;
use App\Services\OrderDetail\OrderDetailServiceInterface;
use App\Utilities\Constant;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class CheckOutController extends Controller
{

    private $orderService;
    private $orderDetailService;

    public function __construct(OrderServiceInterface $orderService, OrderDetailServiceInterface $orderDetailService)
    {
        $this->orderService = $orderService;
        $this->orderDetailService = $orderDetailService;
    }

    public function index()
    {
        $carts = Cart::content();
        $total = Cart::total();

        return view('front.checkout.index', compact('carts', 'total'));
    }

    public function addOrder(Request $request)
    {
        //Them don hang
        $data = $request->validate([
            'fullname' => 'required|string',
            'address' => 'required|string',
            'email' => 'required|email',
            'phone' => ['required', 'regex:/^(0[3|5|7|8|9])[0-9]{8}$/'],
            'payment_type' => 'required|string'
        ]);
        $data['status'] = Constant::order_status_Unconfirmed ;
        $data['user_id'] = Auth::user()->id;
        $order = $this->orderService->create($data);

        //Them chi tiet don hang
        $carts = Cart::content();

        foreach ($carts as $cart) {
            $data = [
                'order_id' => $order->id,
                'product_id' => $cart->id,
                'quantity' => $cart->quantity,
                'amount' => $cart->price,
                'total_price' => $cart->quantity * $cart->price,
            ];

            $this->orderDetailService->create($data);
        }

        $total = Cart::total();
        $this->sendEmail($order, $total); //Gui email

        //Xoa gio hang
        Cart::destroy();

        //Tra ve ket qua thong bao
        return redirect('checkout/result')->with('notification', 'Đặt hàng thành công! Vui lòng kiểm tra email của bạn');
    }

    public function result()
    {
        $notification = session('notification');
        return view('front.checkout.result', compact('notification'));
    }

    public function sendEmail($order, $total)
    {
        $email_to = $order->email;

        Mail::send(
            'front.checkout.email',
            compact('order', 'total'),
            function ($message) use ($email_to) {
                $message->from('ngodat331311@gmail.com', 'Ngô Thanh Đạt');
                $message->to($email_to, $email_to);
                $message->subject('Thông báo về đơn hàng');
            }
        );
    }
}
