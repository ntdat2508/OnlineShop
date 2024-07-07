<?php

namespace App\Services\Product;

use App\Repositories\Product\ProductRepositoryInterface;
use App\Services\BaseService;

class ProductService extends BaseService implements ProductServiceInterface
{
    public $repository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->repository = $productRepository;
    }

    public function find($id)
    {
        $product =  $this->repository->find($id);

        $avgRating = 0;
        $sumRating = array_sum(array_column($product->productRatings->toArray(), 'rating'));
        $countRating = count($product->productRatings);
        if ($countRating != 0) {
            $avgRating = $sumRating / $countRating;
        }

        $product->avgRating = $avgRating;

        return $product;
    }

    public function getRelatedProducts($product, $limit = 4)
    {
        return $this->repository->getRelatedProducts($product, $limit);
    }

    public function getFeaturedProduct()
    {
        return [
            "men" => $this->repository->getFeatureProductsByCategory(1),
            "women" => $this->repository->getFeatureProductsByCategory(2),
            "kids" => $this->repository->getFeatureProductsByCategory(3),
        ];
    }

    public function getProductOnIndex($request)
    {
        return $this->repository->getProductOnIndex($request);
    }

    public function getProductsByCategory($categoryName, $request)
    {
        return $this->repository->getProductsByCategory($categoryName, $request);
    }
}
