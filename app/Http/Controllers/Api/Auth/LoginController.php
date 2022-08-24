<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\APIController;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Auth;

/**
 * Class LoginController
 * @package App\Http\Controllers\Api\Auth
 * @author
 */
class LoginController extends APIController
{
    public function __construct()
    {
        //
    }

    public function main(LoginRequest $request)
    {
        return $this->safe(function () use ($request) {
            $credentials = $request->validated();
            if (Auth::attempt($credentials)) {
                $name = $request->user()->name;
                $token = $request->user()->createToken($name);
                return ['token' => $token->plainTextToken, ''];
            }
            return $this->error('BAD_PARAMETERS', [
                'message' => 'Thong tin tai khoa ko chinh xac, xin moi dang nhap lai!'
            ]);
        });
    }
}
