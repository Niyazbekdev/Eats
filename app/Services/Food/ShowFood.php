<?php

namespace App\Services\Food;

use App\Models\Menu;
use App\Services\BaseServices;
use Illuminate\Validation\ValidationException;

class ShowFood extends BaseServices
{
    public function rules(): array
    {
        return [
            'id' => 'exists:food,id'
        ];
    }

    /**
     * @throws ValidationException
     */
    public function execute(array $data)
    {
        $this->validate($data);
        $food = Menu::where('id', $data['id'])->first();
        if(!$food){
            return response([
                'message' => 'food not found'
            ]);
        }else{
            return $food;
        }
    }
}
