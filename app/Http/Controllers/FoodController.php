<?php

namespace App\Http\Controllers;

use App\Http\Resources\FoodResource;
use App\Services\Food\IndexFood;
use App\Traits\JsonRespondController;
use http\Env\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class FoodController extends Controller
{
    use JsonRespondController;
    public function index(): AnonymousResourceCollection
    {
        $food = app(IndexFood::class)->execute([]);
        return FoodResource::collection($food);
    }
}
