<?php

namespace App\Http\Requests\Auth;

use App\Http\Requests\APIRequest;

/**
 * Class DeviceRequest
 * @package App\Http\Requests\Auth
 * @author
 */
class DeviceRequest extends APIRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['bail', 'alpha_dash', 'string', 'required'],
            'ma_sp' => ['bail', 'alpha_dash', 'string', 'required', 'min:10'],
            'price' => ['number', 'required'],
            'bao_hanh' => ['number', 'required'],
            'so-luong' => ['number', 'nullable']
        ];
    }
}
