<?php


namespace App\Services\ProductBrand;

use App\Repositories\ProductBrand\ProductBrandRepositoryInterface;
use App\Services\BaseService;

class ProductBrandService extends BaseService implements ProductBrandServiceInterface
{
    public $repository;

    public function __construct(ProductBrandRepositoryInterface $productBrandRepository)
    {
        $this->repository = $productBrandRepository;
    }
}
