<?php

namespace Modules\Product\Entities;

use Illuminate\Database\Eloquent\Model;


class ProductTranslation extends Model
{
    protected $table = 'product__product_translations';
    protected $fillable = [
        'product_id',
        'name',
        'description',
        'status'
    ];

    protected $casts = [
        'status' => 'boolean',
    ];


}
