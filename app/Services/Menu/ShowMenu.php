<?php

namespace App\Services\Menu;

use App\Models\Menu;
use App\Services\BaseServices;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;

class ShowMenu extends BaseServices
{
    public function rules(): array
    {
        return [
            'id' => 'exists:menus,id',
        ];
    }

    /**
     * @throws ValidationException
     * @throws ModelNotFoundException
     */
    public function execute(array $data)
    {
        $this->validate($data, $this->rules());
        $menu = Menu::where('id', $data['id'])->first();
        if(!$menu){
            return response([
                'message' => 'menu not found'
            ]);
        }else{
            return $menu;
        }
    }

}
