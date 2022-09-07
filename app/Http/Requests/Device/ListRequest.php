<?php

namespace App\Http\Requests\Device;

use App\Http\Requests\APIRequest;

/**
 * Class ListRequest
 * @package App\Http\Requests\Device
 * @author
 */
class ListRequest extends APIRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
           'per_page' => ['nullable', 'integer', 'min:3', 'max:20'],
        ];
    }
}
