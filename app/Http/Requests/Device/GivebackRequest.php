<?php

namespace App\Http\Requests\Device;

use App\Http\Requests\APIRequest;

/**
 * Class RepayRequest
 * @package App\Http\Requests\Device
 * @author
 */
class GivebackRequest extends APIRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'returned_at' => ['nullable', 'date', 'after:rented_at']
        ];
    }
}
