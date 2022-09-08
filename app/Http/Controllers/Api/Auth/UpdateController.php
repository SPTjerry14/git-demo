<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\APIController;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Requests\Auth\UpdateRequest;
use App\Models\User;
use App\Services\ProfileService;
use App\Services\UserService;

/**
 * Class UpdateController
 * @package App\Http\Controllers\Api\Auth
 * @author
 */
class UpdateController extends APIController
{
    /**
     * @var \App\Services\UserService
     * @var \App\Services\ProfileService
     */
    protected $userService;
    protected $profileService;

    public function __construct(UserService $userService, ProfileService $profileService)
    {
        $this->userService = $userService;
        $this->profileService = $profileService;
    }

    public function main(UpdateRequest $request, $id)
    {
        $params = $request->validated();
        $rawprofile = array_key_exists('profile', $params) ? array_merge($params['profile']) : [];
        if (array_key_exists('profile', $params)) {
            unset($params['profile']);
        }
        $userUpdate = $this->userService->update($params, $id);
        $profile = $this->profileService->update($rawprofile, $id);
        return $this->success('UPDATED', ['id' => $id]);
    }
}
