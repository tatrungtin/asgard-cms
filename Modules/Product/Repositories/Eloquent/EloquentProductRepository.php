<?php

namespace Modules\Product\Repositories\Eloquent;


use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;
use Modules\Product\Entities\Product;
use Modules\Product\Repositories\ProductRepository;

class EloquentProductRepository extends EloquentBaseRepository implements ProductRepository
{
    /**
     * @inheritdoc
     */
    public function getAll()
    {
        $products = $this->allWithBuilder();
        return $products->paginate(10);
    }

    public function create($data)
    {
        return $this->model->create($data);
    }

}
