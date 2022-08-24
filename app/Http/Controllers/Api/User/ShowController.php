<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\APIController;
use App\Services\UserService;
use Illuminate\Http\Request;

/**
 * Class ShowController
 * @package App\Http\Controllers\Api\User
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

    public function main(\Illuminate\Http\Request $request)
    {
        return $this->safe(function () use ($request) {
            $user = $this->userService->show($request->id);
            return $this->success('SHOW', $user);
        });
    }
}
