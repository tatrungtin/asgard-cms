<?php

namespace Modules\Product\Transformers;

use Illuminate\Http\Resources\Json\Resource;

class ProductTransformer extends Resource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'image'=> $this->image,
            'description' => $this->description,
            'price' => (int)$this->price,
            'created_at' => $this->created_at->format('d-m-Y'),
            'translations' => [
                'name' => optional($this->translate(locale()))->name,
                'description' => optional($this->translate(locale()))->description,

            ]
        ];
    }
}
