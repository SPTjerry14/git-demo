<?php

namespace App\Http\Requests\Auth;

use App\Http\Requests\APIRequest;

/**
 * Class ProfileRequest
 * @package App\Http\Requests\Auth
 * @author
 */
class ProfileRequest extends APIRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'first_name' => ['bail', 'alpha_dash', 'string', 'nullable'],
            'last_name' => ['bail', 'alpha_dash', 'string', 'nullable'],
            'email' => ['nullable', 'email'],
            'phone' => ['nullable', 'numeric', 'regex:/^([0]{1}|\+84)([0-9]{9})$/'],
            'gender' => ['numeric', 'nullable'],
        ];
    }
}
