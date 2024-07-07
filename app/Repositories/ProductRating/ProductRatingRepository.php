<?php

namespace App\Repositories\ProductRating;

use App\Models\ProductRating;
use App\Repositories\BaseRepository;

class ProductRatingRepository extends BaseRepository implements ProductRatingRepositoryInterface {
    public function getModel()
    {
        return ProductRating::class;
    }
}