<?php

namespace App\Repositories\ProductCategory;

use App\Models\Category;
use App\Repositories\BaseRepository;

class ProductCategoryRepository extends BaseRepository implements ProductCategoryRepositoryInterface
{
    public function getModel()
    {
        return Category::class;
    }

    public function getFeatureProducts()
    {
        return $this->model
                    ->whereHas('products', function($query) {
                        $query->where('quantity', '>', 0);
                    })
                    ->with(['products' => function($query) {
                        $query->where('quantity', '>', 0);
                    }])
                    ->orderBy('id', 'asc')
                    ->get();
    }
}
