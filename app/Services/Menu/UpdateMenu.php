<?php

namespace App\Services\Menu;

use App\Models\Menu;
use App\Services\BaseServices;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;

class UpdateMenu extends BaseServices
{
    public function rules(): array
    {
        return [
            'id' => 'exists:menus,id',
            'name' => 'required',
            'image' => 'required'
        ];
    }

    /**
     * @throws ValidationException
     * @throws ModelNotFoundException
     */
    public function execute(array $data)
    {
        $this->validate($data, $this->rules());
        $menu = Menu::find($data['id']);
        $menu->update([
            'name' => $data['name'],
            'image' => $data['image']
        ]);
        return $menu;
    }
}
