<?php

namespace App\Http\Controllers\Api\Device;

use App\Services\DeviceService;
use App\Http\Controllers\APIController;

/**
 * Class UpdateController
 * @package App\Http\Controllers\Api\Device
 * @author
 */
class UpdateController extends APIController
{
    protected $deviceService;

    public function __construct(DeviceService $deviceService)
    {
        $this->deviceService = $deviceService;
    }


    /**
     * @group Device
     *
     * Update Device
     *
     * @param UpdateRequest $request
     *
     * @bodyParam code_name integer required  Code_name of device. Example : 123
     * @bodyParam name string required Name of device. Example : asd
     * @bodyParam price number Number of device. Example : 123456
     * @bodyParam status enum Status of device. Example : new
     *
     * @return \Illuminate\Http\JsonResponse
     */

    public function main(\App\Http\Requests\Device\UpdateRequest $request)
    {
        return $this->safe(function () use ($request) {
            $params = $request->validated();
            $device = $this->deviceService->update($params, $request->id);
            return $this->success('UPDATED', $device);
        });
    }
}
