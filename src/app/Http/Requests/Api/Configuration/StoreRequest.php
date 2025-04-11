<?php

namespace App\Http\Requests\Api\Configuration;

use App\Http\Requests\BaseRequest;

class StoreRequest extends BaseRequest
{
    public function rules(): array
    {
        return [
            'car_id' => ['required', 'integer', 'exists:cars,id'],
            'name' => ['required', 'string', 'min:1', 'max:255'],
        ];
    }
}
