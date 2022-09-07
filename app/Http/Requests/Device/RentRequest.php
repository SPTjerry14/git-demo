<?php

namespace App\Http\Requests\Device;

use App\Http\Requests\APIRequest;

/**
 * Class RentRequest
 * @package App\Http\Requests\Device
 * @author
 */
class RentRequest extends APIRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'user_id' => ['required', 'integer', 'exists:users,id'],
            'rented_at' => ['nullable', 'date', 'after:now'],
            'returned_at' => ['nullable', 'date', 'after:rented_at']
        ];
    }
}
