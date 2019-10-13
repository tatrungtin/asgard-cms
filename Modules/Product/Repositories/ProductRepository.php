<?php

namespace Modules\Product\Repositories;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use Modules\Core\Repositories\BaseRepository;

interface ProductRepository extends BaseRepository
{
    public function getAll();
}
