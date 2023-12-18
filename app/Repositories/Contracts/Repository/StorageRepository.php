<?php

namespace App\Repositories\Contracts\Repository;

use App\Models\Storage;
use App\Repositories\Contracts\RepositoryInterface\StorageRepositoryInterface;
use App\Repositories\BaseRepository;

class StorageRepository extends BaseRepository implements StorageRepositoryInterface
{
    public function getModel()
    {
        return Storage::class;
    }

    public function getStorageByCondition($condition, array $column = ['*'])
    {
        $query = $this->model->newQuery();
        $query->select($column)
            ->where('storages.deleted_at', '=', null)
            ->where('storages.quantity', '>', '0')
            ->join('products', 'storages.product_id', '=', 'products.id')->get();

        if (isset($condition['key'])) {
            $query->where('products.name', 'like', '%'.$condition['key'].'%')
                  ->orwhere('quantity', 'like', '%'.$condition['key'].'%')
            ->get();
        }

        return $query->paginate(6);
    }

    public function updateProductId($id, $attributes = [])
    {
        $result = $this->model->where('product_id', $id)->first();
        if($result){
            $result->update($attributes);

            return $result;
        }

        return false;
    }

    public function findProduct($product_id)
    {
        return $this->model
        ->where('product_id', $product_id)
        ->where('storages.deleted_at', '=', null)
        ->first();
    }

    public function getProductSale(array $column = ['*'])
    {
        $query = $this->model->newQuery();
        $query->select($column)->where('storages.deleted_at', '=', null)
                               ->join('products', 'products.id', '=', 'storages.product_id')
                               ->where('products.sale', '>', 0)
                               ->where('storages.quantity', '>', '0')
                               ->orderByDesc('sale')
                               ->limit(7);

        return $query->get();
    }


}
