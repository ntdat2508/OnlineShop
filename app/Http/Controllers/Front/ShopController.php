<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Services\Product\ProductServiceInterface;
use App\Services\ProductBrand\ProductBrandServiceInterface;
use App\Services\ProductCategory\ProductCategoryServiceInterface;
use App\Services\ProductRating\ProductRatingServiceInterface;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    private $productService;
    private $productRatingService;
    private $productCategoryService;
    private $productBrandService;

    public function __construct(
        ProductServiceInterface $productService,
        ProductRatingServiceInterface $productRatingService,
        ProductCategoryServiceInterface $productCategoryService,
        ProductBrandServiceInterface $productBrandService
    ) {
        $this->productService = $productService;
        $this->productRatingService = $productRatingService;
        $this->productCategoryService = $productCategoryService;
        $this->productBrandService = $productBrandService;
    }

    public function index(Request $request)
    {
        $categories = $this->productCategoryService->all();
        $brands = $this->productBrandService->all();
        $products = $this->productService->getProductOnIndex($request);
        return view('front.shop.index', compact('products', 'categories', 'brands'));
    }

    public function show($id)
    {
        $categories = $this->productCategoryService->all();
        $brands = $this->productBrandService->all();
        $product = $this->productService->find($id);
        $relatedProducts = $this->productService->getRelatedProducts($product);

        return view('front.shop.show', compact('product', 'relatedProducts', 'categories', 'brands'));
    }

    public function postRating(Request $request)
    {
        $this->productRatingService->create($request->all());
        return redirect()->back();
    }

    public function category($categoryName, Request $request)
    {
        $categories = $this->productCategoryService->all();
        $brands = $this->productBrandService->all();
        $products = $this->productService->getProductsByCategory($categoryName, $request);
        return view('front.shop.index', compact('products', 'categories', 'brands'));
    }
}
