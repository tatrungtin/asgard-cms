<?php

namespace Modules\User\Services;


use Modules\Product\Repositories\ProductRepository;

class Product
{
    /**
     * @var ProductRepository\
     */
    private $product;


    public function __construct(ProductRepository $product)
    {
        $this->product = $product;
    }

    public function getAll()
    {

    }

}
