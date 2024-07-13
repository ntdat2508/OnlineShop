<?php

namespace App\Repositories\Product;

use App\Models\Category;
use App\Models\Product;
use App\Repositories\BaseRepository;
use Illuminate\Http\Request;

class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{
    public function getModel()
    {
        return Product::class;
    }

    public function getRelatedProducts($product, $limit = 4)
    {
        return $this->model->where('category_id', $product->category_id)
            ->where('tag', $product->tag)
            ->limit(4)
            ->get();
    }

    public function getProductOnIndex($request)
    {

        $search = $request->search ?? '';

        $products = $this->model->where('name', 'like', '%' . $search . '%');

        $products = $this->filter($products, $request);

        $products = $this->sortAndPagination($products, $request);

        return $products;
    }

    public function getProductsByCategory($categoryName, $request)
    {
        $products = Category::where('name', $categoryName)->first()->products->toQuery();

        $products = $this->filter($products, $request);

        $products = $this->sortAndPagination($products, $request);

        return $products;
    }

    private function sortAndPagination($products, Request $request)
    {
        $perPage = $request->show ?? 3;
        $sortBy = $request->sort_by ?? 'lastest';
        switch ($sortBy) {
            case 'lastest':
                $products = $products->where('quantity', '>', 0)->orderBy('id');
                break;
            case 'oldest':
                $products = $products->where('quantity', '>', 0)->orderByDesc('id');
                break;
            case 'name-ascending':
                $products = $products->where('quantity', '>', 0)->orderBy('name');
                break;
            case 'name-descending':
                $products = $products->where('quantity', '>', 0)->orderByDesc('name');
                break;
            case 'price-ascending':
                $products = $products->where('quantity', '>', 0)->orderBy('price');
                break;
            case 'price-descending':
                $products = $products->where('quantity', '>', 0)->orderByDesc('price');
                break;
            default:
                $products = $products->where('quantity', '>', 0)->orderBy('id');
        }

        $products = $products->paginate($perPage);

        $products->appends(['sort_by' => $sortBy, 'show' => $perPage]);

        return $products;
    }

    private function filter($products, Request $request)
    {
        $brands = $request->brand ?? [];
        $brand_ids = array_keys($brands);
        $products = $brand_ids != null ? $products->whereIn('brand_id', $brand_ids) : $products;

        $color = $request->color;
        $products = $color != null
            ?  $products->where('color', $color)
            ->where('quantity', '>', 0)
            : $products;

        $size = $request->size;
        $products = $size != null
            ? $products->where('size', $size)
            ->where('quantity', '>', 0)
            : $products;

        return $products;
    }
}
