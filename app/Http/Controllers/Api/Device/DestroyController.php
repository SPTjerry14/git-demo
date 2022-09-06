<?php

namespace App\Http\Controllers\Api\Device;

use App\Http\Controllers\APIController;
use App\Services\DeviceService;

/**
 * Class DestroyController
 * @package App\Http\Controllers\Api\Device
 * @author
 */
class DestroyController extends APIController
{
    protected $deviceService;

    public function __construct(DeviceService $deviceService)
    {
        $this->deviceService = $deviceService;
    }

    /**
     * @group Device
     *
     * Delete Device
     *
     * @urlParam id integer required  Id of device. Will be delete. Example : 1
     *
     * @return \Illuminate\Http\JsonResponse
     */

    public function main($id)
    {
        return $this->safe(function () use ($id) {
            $delete = $this->deviceService->destroy($id);
            if ($delete) {
                return $this->success('DELETED', ['message' => 'Đã xóa thành công!!!']);
            }
            return $this->error('BAD_PARAMETERS', [
                'message' => 'Tài khoản không tồn tại. Xóa không thành công!!!',
            ]);
        });
    }
}
