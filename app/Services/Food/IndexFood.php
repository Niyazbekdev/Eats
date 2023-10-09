<?php

namespace App\Services\Food;

use App\Models\Food;
use App\Services\BaseServices;
use Illuminate\Database\Eloquent\Collection;

class IndexFood extends BaseServices
{
    public function execute(array $data): Collection
    {
        return Food::all(['id', 'name', 'description', 'price', 'menu_id', 'image']);
    }
}
