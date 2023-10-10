<?php

namespace App\Http\Controllers;

use App\Http\Resources\FoodResource;
use App\Services\Food\IndexFood;
use App\Services\Food\StoreFood;
use App\Traits\JsonRespondController;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Validation\ValidationException;

class FoodController extends Controller
{
    use JsonRespondController;
    public function index(): AnonymousResourceCollection
    {
        $food = app(IndexFood::class)->execute([]);
        return FoodResource::collection($food);
    }
    public function store(Request $request)
    {
        try {
           app(StoreFood::class)->execute($request->all());
           return $this->respondSuccess();
        }catch (ValidationException $exception){
            return $this->respondValidatorFailed($exception->validator);
        }

    }

}
