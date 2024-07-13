<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Services\ProductCategory\ProductCategoryService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $productCategoryService;

    public function __construct(ProductCategoryService $productCategoryService)
    {
        $this->productCategoryService = $productCategoryService;
    }

    public function index()
    {
        $featureProducts = $this->productCategoryService->getFeatureProducts();

        return view('front.index', compact('featureProducts'));
    }

    public function contact() {
        return view('front.contact');
    }
}
