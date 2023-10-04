<?php

namespace App\Http\Controllers;

use App\Http\Resources\MenuResource;
use App\Services\Menu\IndexMenu;
use App\Traits\JsonRespondController;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class MenuController extends Controller
{
    use JsonRespondController;
    public function index(Request $request): AnonymousResourceCollection
    {
        $category = app(IndexMenu::class)->execute([]);
        return MenuResource::collection($category);
    }
}
