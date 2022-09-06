<?php

namespace App\Http\Requests\Device;

use App\Http\Requests\APIRequest;

/**
 * Class UpdateRequest
 * @package App\Http\Requests\Device
 * @author
 */
class UpdateRequest extends APIRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'code_name'=>['required', 'integer' ],
            'name'=>['required', 'string', 'alpha_dash'],
            'price'=>['required', 'numeric'],
            'status'=>['string']
        ];
    }
}
