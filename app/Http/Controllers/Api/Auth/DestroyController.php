<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\APIController;
use App\Models\User;
use App\Services\UserService;

/**
 * Class DestroyController
 * @package App\Http\Controllers\Api\Auth
 * @author
 */
class DestroyController extends APIController
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
        $deleteUser = $this->userService->destroy($id);
        if ($deleteUser) {
            return $this->success('DELETED', [
                'message' => 'Đã xóa thành công!!!',
            ]);
        }
        return $this->error('BAD_PARAMETERS', [
            'message' => 'Tài khoản không tồn tại. Xóa không thành công!!!',
        ]);
    }
}
