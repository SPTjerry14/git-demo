<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\APIController;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\LogoutRequest;
use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Requests\Auth\RegisterRequest;

/**
 * Class LogoutController
 * @package App\Http\Controllers\Api\Auth
 * @author
 */
class LogoutController extends APIController
{
    public function __construct()
    {
        //
    }

    public function main(LoginRequest $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            'message' => 'Successfully logged out',
        ]);
    }
}
