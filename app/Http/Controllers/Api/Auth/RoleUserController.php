<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\APIController;
use App\Services\UserService;

/**
 * Class RoleUserController
 * @package App\Http\Controllers\Api\Auth
 * @author
 */
class RoleUserController extends APIController
{
    /**
     * @var \App\Services\UserService
     */
    protected $userService;
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function main()
    {
        return $this->userService->roleUser($id);
    }
}
