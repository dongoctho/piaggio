<?php

namespace App\Repositories\Contracts\Repository;

use App\Models\Product;
use App\Repositories\Contracts\RepositoryInterface\ProductRepositoryInterface;
use App\Repositories\BaseRepository;

class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{
    public function getModel()
    {
        return Product::class;
    }

    public function getNewProduct(array $column = ['*'])
    {
        $query = $this->model->newQuery();
        $query->select($column)->where('products.deleted_at', '=', null)
                                ->join('storages', 'products.id', '=', 'storages.product_id')
                               ->where('storages.quantity', '>', '0')
                               ->orderByDesc('products.created_at')
                               ->limit(7);

        return $query->get();
    }

    public function countProduct()
    {
        $query = $this->model->newQuery();
        $query->selectRaw("COUNT(id) as countProduct");

        return $query->get();
    }

    public function getProduct()
    {
        return $this->model->whereNull('deleted_at')->get();
    }

    public function findProduct($product_id)
    {
        return $this->model
        ->where('products.id', $product_id)
        ->where('products.deleted_at', '=', null)
        ->first();
    }

    public function findIdProduct($product_id)
    {
        return $this->model
        ->where('products.name', '=', $product_id)
        ->where('products.deleted_at', '=', null)
        ->first();
    }

    public function getByCondition($condition, array $column = ['*'])
    {
        $query = $this->model->newQuery();
        $query->select($column)->where('products.deleted_at', '=', null)
                               ->where('storages.quantity', '>', '0')
                               ->join('storages', 'products.id', '=', 'storages.product_id');

        if (isset($condition['findPrice'])) {
            if ($condition['findPrice'] == 1) {
                $query->where('price', '<=', 100000000);
            }
            if ($condition['findPrice'] == 2) {
                $query->where('price', '>=', 100000000)
                      ->where('price', '<=', 200000000);
            }
            if ($condition['findPrice'] == 3) {
                $query->where('price', '>=', 200000000);
            }
        }

        if (isset($condition['findCategoryName'])) {
            $query->where('category_id', '=', $condition['findCategoryName']);
        }

        if (isset($condition['findProductName'])) {
            $query->where('name', 'like', '%'.$condition['findProductName'].'%')
            ->get();
        }
        return $query->paginate(8);
    }

    public function getProductByCondition($condition, array $column = ['*'])
    {
        $query = $this->model->newQuery();
        $query->select($column)->where('products.deleted_at', '=', null)->get();

        if (isset($condition['key'])) {
            $query->where('name', 'like', '%'.$condition['key'].'%')
                  ->orWhere('code', 'like', '%'.$condition['key'].'%')
                  ->orWhere('price', 'like', '%'.$condition['key'].'%')
            ->get();
        }

        return $query->paginate(6);
    }

    public function getProductByConditionAdmin($condition, array $column = ['*'])
    {
        $query = $this->model->newQuery();
        $query->select($column)->where('products.deleted_at', '=', null)
                               ->where('storages.quantity', '>', '0')
                               ->join('storages', 'products.id', '=', 'storages.product_id');

        return $query->get();
    }

    public function getProductByCategory($category_id, array $column = ['*'])
    {
        $query = $this->model->newQuery();
        $query->select($column)->where('products.deleted_at', '=', null)
                               ->where('categories.deleted_at', '=', null)
                               ->where('storages.quantity', '>', '0')
                               ->where('products.category_id', '=', $category_id)
                               ->join('storages', 'products.id', '=', 'storages.product_id')
                               ->join('categories', 'products.category_id', '=', 'categories.id');

        return $query->get();
    }

}
