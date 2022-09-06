<?php

namespace App\Http\Controllers\Api\Device;

use App\Services\DeviceService;
use App\Http\Controllers\APIController;

/**
 * Class AddController
 * @package App\Http\Controllers\Api\Device
 * @author
 */
class AddController extends APIController
{
    protected $deviceService;

    public function __construct(DeviceService $deviceService)
    {
        $this->deviceService = $deviceService;
    }
    /**
     * @group Device
     *
     * Add Device
     *
     * @param AddRequest $request
     *
     * @bodyParam code_name integer required unique Code_name of device. Example : 123
     * @bodyParam name string required unique Name of device. Example : asd
     * @bodyParam price number Number of device. Example : 123456
     * @bodyParam status enum Status of device. Example : new
     *
     * @return \Illuminate\Http\JsonResponse
     */

    public function main(\App\Http\Requests\Device\AddRequest $request)
    {
        return $this->safe(function () use ($request) {
            $params = $request->validated();
            $device = $this->deviceService->store($params);
            return $this->success('CREATED', $device);
        });
    }
}
