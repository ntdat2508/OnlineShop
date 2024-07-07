<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Services\Order\OrderServiceInterface;
use App\Services\OrderDetail\OrderDetailServiceInterface;
use App\Utilities\Constant;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
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
        $subtotal = Cart::subtotal();

        return view('front.checkout.index', compact('carts', 'total', 'subtotal'));
    }

    public function addOrder(Request $request)
    {
        //Them don hang
        $data = $request->all();
        $data['status'] = Constant::order_status_Unconfirmed ;
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
        $subtotal = Cart::subtotal();
        $this->sendEmail($order, $total, $subtotal); //Gui email

        //Xoa gio hang
        Cart::destroy();

        //Tra ve ket qua thong bao
        return redirect('checkout/result')->with('notification', 'Success! You will pay on delivery, Please check your email');
    }

    public function result()
    {
        $notification = session('notification');
        return view('front.checkout.result', compact('notification'));
    }

    public function sendEmail($order, $total, $subtotal)
    {
        $email_to = $order->email;

        Mail::send(
            'front.checkout.email',
            compact('order', 'total', 'subtotal'),
            function ($message) use ($email_to) {
                $message->from('ngodat331311@gmail.com', 'Dat_NT');
                $message->to($email_to, $email_to);
                $message->subject('Order Notification');
            }
        );
    }
}
