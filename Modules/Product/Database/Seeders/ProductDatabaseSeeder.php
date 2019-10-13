<?php

namespace Modules\Product\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Product\Entities\Product;
use Modules\Product\Repositories\ProductRepository;

class ProductDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    private $product;
    public function __construct(ProductRepository $product)
    {
        $this->product = $product;
    }

    public function run()
    {
        Model::unguard();
        for ($i = 0; $i < 100; $i++) {
            $data = [
                'name' => 'San phẩm ' . $i,
                'description' => 'Mo ta '. $i,
                'image' => 'image.jpg',
                'price' => 1000* $i
            ];
            $this->product->create($data);
        }

    }
}
