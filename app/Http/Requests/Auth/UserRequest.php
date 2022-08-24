<?php

namespace App\Http\Requests\Auth;

use App\Http\Requests\APIRequest;

/**
 * Class UserRequest
 * @package App\Http\Requests\Auth
 * @author
 */
class UserRequest extends APIRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'first_name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'phone' => ['nullable', 'numeric', 'regex:/^([0]{1}|\+84)([0-9]{9})$/'],
            'email' => ['nullable', 'email'],
            'date_of_birth' => ['date', 'nullable'],
        ];
    }
}
