<?php

namespace Modules\Product\Events;

use Modules\Product\Entities\Product;

class ProductWasCreated
{
    /**
     * @var Tag
     */
    public $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }
}
