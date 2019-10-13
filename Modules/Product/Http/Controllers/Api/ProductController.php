<?php

namespace Modules\Product\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Product\Entities\Product;
use Modules\Product\Repositories\ProductRepository;
use Modules\Product\Transformers\ProductTransformer;

class ProductController extends Controller
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
        $product = $this->product->getAll();
        return response()->json([
            'result' => 'ok',
            'data' => ProductTransformer::collection($product)
        ]);
    }

    public function store(Request $request)
    {
        return response()->json([
            'result' => 'ok',
            'message' => $this->product->create($request->all()),
        ]);
    }

}
