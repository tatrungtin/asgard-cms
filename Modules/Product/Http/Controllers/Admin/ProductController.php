<?php

namespace Modules\Product\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Modules\Core\Http\Controllers\Admin\AdminBaseController;
use Modules\Product\Repositories\ProductRepository;

class ProductController extends AdminBaseController
{
    /**
     * @var ProductRepository
     */
    private $product;


    public function __construct(ProductRepository $product)
    {
        $this->product = $product;

    }

    public function index(Request $request)
    {
       dd(1);
    }


}
