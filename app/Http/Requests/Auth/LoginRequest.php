<?php

namespace App\Http\Requests\Auth;

use App\Http\Requests\APIRequest;

/**
 * Class LoginRequest
 * @package App\Http\Requests\Auth
 * @author
 */
class LoginRequest extends APIRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "name" => ["nullable", "string"],
            // 'phone' => ['nullable', 'numeric', 'regex:/^([0]{1}|\+84)([0-9]{9})$/'],
            // 'email' => ["nullable", "email"],
            "password" => ["required", "string", "min:8"],
        ];
    }
}
