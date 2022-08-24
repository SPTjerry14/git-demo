<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\APIController;
use App\Services\ProfileService;
use App\Services\UserService;
use Illuminate\Support\Facades\DB;

/**
 * Class ListController
 * @package App\Http\Controllers\Api\Auth
 * @author
 */
class ListController extends APIController
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

    public function listUser()
    {
        // $users = DB::table('users')->get();
        return $this->userService->list();
    }

    public function listProfile()
    {
        return $this->profileService->list();
    }

    public function listRole()
    {
        return $this->userService->role();
    }
}
