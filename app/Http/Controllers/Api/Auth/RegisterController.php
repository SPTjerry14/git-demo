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
    
    public function main(RegisterRequest $request)
    {
        return $this->safe(function () use ($request) {

            $params = $request->validated();
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
