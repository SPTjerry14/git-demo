<?php

namespace App\Http\Controllers\Api\Profile;

use App\Http\Controllers\APIController;
use App\Http\Requests\Auth\ProfileRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\Profile;
use App\Models\User;
use App\Services\ProfileService;
use App\Services\UserService;
use Illuminate\Http\Request;

/**
 * Class UpdateController
 * @package App\Http\Controllers\Api\Profile
 * @author
 */
class UpdateController extends APIController
{
    /**
     * @var \App\Services\ProfileService
     */
    protected $userService;
    protected $profileService;
    public function __construct(ProfileService $profileService, UserService $userService)
    {
        $this->profileService = $profileService;
        $this->userService = $userService;
    }

    public function main(ProfileRequest $request, $id)
    {
        $profilUpdate = $request->validated();
        $profile = $this->profileService->updated($profilUpdate, $id);
        if ($profile) {
            return $this->success('UPDATED', [
                'message' => 'update thành công !',
                'id' => $id,
            ]);
        }
        return $this->error('BAD_PARAMETERS', [
            'message' => "Update thất bại!, vui lòng thử lại!",
        ]);
    }
}
