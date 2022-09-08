<?php

namespace App\Http\Controllers\Api\Auth;

use App\Services\UserService;
use App\Http\Controllers\APIController;

/**
 * Class ShowController
 * @package App\Http\Controllers\Api\Auth
 * @author
 */
class ShowController extends APIController
{
    /**
     * @var \App\Services\UserService
     */
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function main($id)
    {
        return $this->safe(function () use ($id) {
            $user = $this->userService->show($id);
            return $this->success('SHOW', $user);
        });
    }
}
