<?php

namespace App\Http\Requests\Auth;

use App\Http\Requests\APIRequest;

/**
 * Class PostRequest
 * @package App\Http\Requests\Auth
 * @author
 */
class PostRequest extends APIRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            //
            'post'=>['required', 'string'],
            'note'=>['required', 'string', 'min:50', 'max:300'],
        ];
    }
}
