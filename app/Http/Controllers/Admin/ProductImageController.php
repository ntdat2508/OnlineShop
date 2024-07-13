<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductImage;
use App\Services\Product\ProductServiceInterface;
use App\Utilities\Common;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductImageController extends Controller
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
        $productImages = $product->productImages;
        return view('admin.product.image.index', compact('product', 'productImages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request, $id)
    {
        $data = $request->all();

        if ($request->hasFile('image')) {
            // Sử dụng hàm uploadFile để lưu tệp và lấy đường dẫn
            $data['path'] = Common::uploadFile($request->file('image'), 'front/img/products');
            unset($data['image']);

            // Tạo bản ghi mới trong bảng ProductImage với đường dẫn ảnh
            ProductImage::create($data);
        }

        // Điều hướng trở lại trang trước đó
        return redirect()->back();
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id, $product_image_id)
    {
        // Tìm bản ghi ProductImage
        $productImage = ProductImage::find($product_image_id);

        // Kiểm tra nếu bản ghi tồn tại
        if ($productImage) {
            // Xoá file
            $file_path = $productImage->path;
            if ($file_path != '') {
                // Sử dụng Storage facade để xoá tệp
                Storage::delete('public/' . str_replace('storage/', '', $file_path));
            }

            // Xoá bản ghi trong db
            $productImage->delete();
        }

        return redirect('admin/product/' . $id . '/image');
    }
}
