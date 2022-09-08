<?php

namespace App\Http\Requests\Auth;

use App\Http\Requests\APIRequest;

/**
 * Class UpdateRequest
 * @package App\Http\Requests\Auth
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
            'name' => ['bail', 'alpha_dash', 'required', 'string'],
            'email' => ['nullable', 'required', 'email'],
            'phone' => ['nullable', 'numeric', 'regex:/^([0]{1}|\+84)([0-9]{9})$/'],
            'password' => ['bail', 'string', 'min:8'],
            'profile' => ['nullable', 'array'],
            'profile.first_name' => ['bail', 'alpha', 'nullable', 'string'],
            'profile.last_name' => ['bail', 'alpha_dash', 'nullable', 'string'],
            'profile.phone' => ['nullable', 'numeric', 'regex:/^([0]{1}|\+84)([0-9]{9})$/'],
            'profile.date_of_birth' => ['nullable', 'date', 'before_or_equal:today'],
        ];
    }
}
