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
    /**
     * @group Auth
     *
     * Logout a user
     *
     * @middleware ['guest']
     *
     * @param LogoutRequest $request
     *
     * @bodyParam name string required Username of user. Example: jerry
     * @bodyParam password string required Password of user. Example: kjav9-09v
     * @bodyParam phone numeric Phone of user. Example: 0987654321
     * @bodyParam email string Email of user. Example: chianh@gmail.com
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function main(LoginRequest $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            'message' => 'Successfully logged out',
        ]);
    }
}
