<?php

namespace App\Services\Food;

use App\Models\Food;
use App\Services\BaseServices;
use Illuminate\Validation\ValidationException;

class StoreFood extends BaseServices
{
    public function rules(): array
    {
        return [
            'name' => 'required|unique:food,name',
            'description' => 'required',
            'price' => 'required',
            'menu_id' => 'required|exists:menus,id',
            'image' => 'required',
        ];
    }

    /**
     * @throws ValidationException
     */
    public function execute(array $data): bool
    {
        $this->validate($data);
        Food::create([
            'name' => $data['name'],
            'description' => $data['description'],
            'price' => $data['price'],
            'menu_id' => $data['menu_id'],
            'image' => $data['image']
        ]);
        return true;
    }
}
