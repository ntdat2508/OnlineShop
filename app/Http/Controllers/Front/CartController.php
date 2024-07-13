<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Services\Product\ProductServiceInterface;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    private $productService;

    public function __construct(ProductServiceInterface $productService)
    {
        $this->productService = $productService;
    }

    public function index()
    {
        $carts = Cart::content();
        $total = Cart::total();

        return view('front.shop.cart', compact('carts', 'total'));
    }

    public function add(Request $request)
    {
        
        $product = $this->productService->find($request->productId);

        $response['cart'] = Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'quantity' => 1,
            'price' => $product->price,
            'options' => [
                'images' => $product->productImages,
            ],
        ]);

        // $product->quantity -= 1;
        // $product->save();
        $response['count'] = Cart::count();
        $response['total'] = Cart::total();

        return $response;
    }

    public function delete(Request $request)
    {
        if ($request->ajax()) {
            $response['cart'] = Cart::remove($request->rowId);

            $response['count'] = Cart::count();
            $response['total'] = Cart::total();

            return $response;
        }

        return back();
    }

    public function update(Request $request)
    {
        if ($request->ajax()) {
            $response['cart'] = Cart::update($request->rowId, $request->quantity);

            $response['count'] = Cart::count();
            $response['total'] = Cart::total();

            return $response;
        }
    }
}
