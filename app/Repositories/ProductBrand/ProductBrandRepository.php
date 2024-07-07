<?php

namespace App\Repositories\ProductBrand;

use App\Models\Brand;
use App\Repositories\BaseRepository;

class ProductBrandRepository extends BaseRepository implements ProductBrandRepositoryInterface
{
    public function getModel()
    {
        return Brand::class;
    }
}
