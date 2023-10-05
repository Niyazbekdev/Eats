<?php

namespace App\Http\Controllers;

use App\Http\Resources\MenuResource;
use App\Services\Menu\IndexMenu;
use App\Services\Menu\ShowMenu;
use App\Traits\JsonRespondController;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Validation\ValidationException;

class MenuController extends Controller
{
    use JsonRespondController;
    public function index(Request $request): AnonymousResourceCollection
    {
        $category = app(IndexMenu::class)->execute([]);
        return MenuResource::collection($category);
    }

    public function show(string $id): JsonResponse|MenuResource
    {
        try {
            $menu = app(ShowMenu::class)->execute([
                'id' => $id,
            ]);
            return new MenuResource($menu);
        }catch (ValidationException $exception){
            return $this->respondValidatorFailed($exception->validator);
        }catch (ModelNotFoundException){
            return $this->respondNotFound();
        }catch (Exception $exception){
            $this->setHTTPStatusCode($exception->getCode());
            return $this->respondWithError($exception->getMessage());
        }
    }
}
