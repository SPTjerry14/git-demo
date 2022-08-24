<?php

namespace App\Http\Controllers\Api\Profile;

use App\Http\Controllers\APIController;
use App\Services\ProfileService;
use Illuminate\Http\Request;

/**
 * Class ShowController
 * @package App\Http\Controllers\Api\Profile
 * @author
 */
class ShowController extends APIController
{
    /**
     * @var \App\Services\ProfileService
     */
    protected $profileService;

    public function __construct(ProfileService $profileService)
    {
        $this->profileService = $profileService;
    }

    // public function main(Request $request)
    // {
    //     // dd($request->id);
    // }

    public function main($id)
    {
        // return $this->profileService->show($id);
        return $this->safe(function () use ($id) {
            $profile = $this->profileService->show($id);
            if (!$profile) {
                return $this->error('BAD_PARAMETERS', [
                    'message' => "người dùng không tồn tại",
                ]);
            }
            return $this->success("SHOW", $profile);
        });
    }
}
