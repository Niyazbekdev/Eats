<?php

namespace App\Services\Menu;

use App\Models\Menu;
use App\Services\BaseServices;
use Illuminate\Database\Eloquent\Collection;

class IndexMenu extends BaseServices
{
public function execute(array $data): Collection
{
    return Menu::all(['id', 'name', 'image']);
}
}
