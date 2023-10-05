<?php

namespace App\Services\Menu;

use App\Models\Menu;
use App\Services\BaseServices;
use Illuminate\Validation\ValidationException;

class StoreMenu extends BaseServices
{
    public function rules(): array
    {
        return [
          'name' => 'required|unique:menus,name',
          'image' => 'required',
        ];
    }

    /**
     * @throws ValidationException
     */
    public function execute(array $data): Menu
    {
        $this->validate($data, $this->rules());
        return Menu::create([
            'name' => $data['name'],
            'image' => $data['image'],
        ]);
    }
}
