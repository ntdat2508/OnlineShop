<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductDetail;
use App\Services\Product\ProductServiceInterface;
use Illuminate\Http\Request;

class ProductDetailController extends Controller
{
    private $productService;

    public function __construct(ProductServiceInterface $productService)
    {
        $this->productService = $productService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $product = $this->productService->find($id);
        $productDetails = $product->productDetails;

        return view('admin.product.detail.index', compact('product', 'productDetails'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $product = $this->productService->find($id);

        return view('admin.product.detail.create', compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $product_id)
    {
        // $data = $request->validate([
        //     'color' => 'required',
        //     'size' => 'required',
        //     'qty' => 'required|numeric|min:1',

        // ]);

        $data = $request->all();

        ProductDetail::create($data);

        $this->updateQuantity($product_id);

        return redirect('admin/product/' . $product_id . '/detail');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $product_detail_id)
    {
        $product = $this->productService->find($id);
        $productDetail = ProductDetail::find($product_detail_id);
        return view('admin.product.detail.edit', compact('product', 'productDetail'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $product_detail_id)
    {
        $data = $request->all();

        ProductDetail::find($product_detail_id)->update($data);

        $this->updateQuantity($id);

        return redirect('admin/product/' . $id . '/detail');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $product_detail_id)
    {
        ProductDetail::find($product_detail_id)->delete();

        return redirect('admin/product/' . $id . '/detail');
    }

    public function updateQuantity($id) {
        $product = $this->productService->find($id);
        $productDetails = $product->productDetails;

        $total = array_sum(array_column($productDetails->toArray(), 'quantity'));

        $this->productService->update(['quantity' => $total], $id);
    }
}
