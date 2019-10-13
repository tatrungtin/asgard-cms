<?php

namespace Modules\Product\Repositories\Eloquent;


use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;
use Modules\Product\Events\ProductIsCreating;
use Modules\Product\Events\ProductWasCreated;
use Modules\Product\Events\TagWasCreated;
use Modules\Product\Repositories\ProductRepository;

class EloquentProductRepository extends EloquentBaseRepository implements ProductRepository
{
    /**
     * @inheritdoc
     */
    public function allForNamespace($namespace)
    {
        return $this->model->with('translations')->where('namespace', $namespace)->get();
    }
    public function getAll()
    {
        $products = $this->allWithBuilder();
        return $products->paginate(10);
    }

    public function create($data)
    {

        event($event = new ProductIsCreating($data));
        $product = $this->model->create($data);
        event(new ProductWasCreated($product));
        return $product;
    }

}
