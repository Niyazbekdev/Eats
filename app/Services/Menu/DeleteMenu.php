<?php

namespace App\Services\Menu;

use App\Models\Menu;
use App\Services\BaseServices;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;
class DeleteMenu extends BaseServices
{
    public function rules(): array
    {
        return [
            'id' => 'exists:menus,id'
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
        $menu->delete();
        return $menu;
    }
}
