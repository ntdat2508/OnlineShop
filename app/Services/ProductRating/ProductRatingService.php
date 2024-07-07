<?php


namespace App\Services\ProductRating;

use App\Repositories\ProductRating\ProductRatingRepositoryInterface;
use App\Services\BaseService;

class ProductRatingService extends BaseService implements ProductRatingServiceInterface {
    public $repository;

    public function __construct(ProductRatingRepositoryInterface $productRatingRepository)
    {
        $this->repository = $productRatingRepository;
    }
}