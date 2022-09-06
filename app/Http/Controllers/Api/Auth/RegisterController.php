<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\APIController;
use App\Http\Requests\Auth\RegisterRequest;
use App\Services\ProfileService;
use App\Services\UserService;

/**
 * Class RegisterController
 * @package App\Http\Controllers\Api\Auth
 * @author
 */
class RegisterController extends APIController
{
    /**
     * @var \App\Services\UserService
     */
    protected $userService;
    protected $profileService;
    public function __construct(UserService $userService, ProfileService $profileService)
    {
        $this->userService = $userService;
        $this->profileService = $profileService;
    }
      /**
     * @group Auth
     *
     * Register a user
     *
     * @middleware ['guest']
     *
     * @param RegisterRequest $request
     *
     * @bodyParam name string required Username of user. Example: jerry
     * @bodyParam password string required Password of user. Example: kjav9-09v
     * @bodyParam phone string required Phone of user Example: 0987654321
     * @bodyParam email string required  Email of user. Example: chianh@gmail.com
     * @bodyParam profile object
     * @bodyParam profile.first_name string . Example: abc
     * @bodyParam profile.last_name string . Example: def
     * @bodyParam profile.phone numeric . Example: 0987654321
     * @bodyParam profile.date_of_birth date . Example: 2013-11-06
     * @return \Illuminate\Http\JsonResponse
     */
    public function main(RegisterRequest $request)
    {
        return $this->safe(function () use ($request) {

            $params = $request->validated();
            dd($params);
            $rawprofile = array_key_exists('profile', $params) ? array_merge($params['profile']) : [];
            if (array_key_exists('profile', $params)) {
                unset($params['profile']);
            }
            // dd($params);
            $user = $this->userService->store($params);
            $rawprofile['user_id'] = $user->id;
            $profile = $this->profileService->store($rawprofile);

            return $this->success('CREATED', ['id' => $user->id]);
        });
    }
}
