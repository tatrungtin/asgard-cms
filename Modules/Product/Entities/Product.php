<?php

namespace Modules\Product\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use Translatable;

    protected $fillable = [
        'name',
        'description',
        'price',
        'image',
        'status'
    ];
    public $translatedAttributes = ['name', 'description'];
    protected $table = 'products';


}
