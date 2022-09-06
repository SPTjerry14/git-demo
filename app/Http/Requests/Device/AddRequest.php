<?php

namespace App\Http\Requests\Device;

use App\Http\Requests\APIRequest;

/**
 * Class AddRequest
 * @package App\Http\Requests\Device
 * @author
 */
class AddRequest extends APIRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'code_name'=>['required', 'integer', 'unique:devices,code_name' ],
            'name'=>['required', 'string', 'alpha_dash', 'unique:devices,name'],
            'price'=>['required', 'numeric'],
            'status'=>['string']
        ];
    }
}
