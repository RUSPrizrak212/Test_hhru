<?php

namespace App\Http\Requests\Api\Price;

use App\Http\Requests\BaseRequest;

class StoreRequest extends BaseRequest
{
    public function rules(): array
    {
        return [
            'configuration_id' => ['required', 'exists:configurations,id'],
            'price' => ['required', 'integer', 'min:100'],
            'start_date' => ['required', 'date'],
            'end_date' => ['required', 'date', 'after:start_date'],
        ];
    }
}
