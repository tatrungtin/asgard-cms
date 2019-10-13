<?php

namespace Modules\Product\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product__products';
    use Translatable;
    public $translatedAttributes = [
        'product_id',
        'name',
        'description',
        'status'
    ];

    protected $fillable = [
        'name',
        'description',
        'price',
        'image',
        'status'
    ];


}
