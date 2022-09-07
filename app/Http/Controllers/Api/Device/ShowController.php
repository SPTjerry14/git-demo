<?php

namespace App\Http\Controllers\Api\Device;

use App\Services\DeviceService;
use App\Http\Controllers\APIController;

/**
 * Class ShowController
 * @package App\Http\Controllers\Api\Device
 * @author
 */
class ShowController extends APIController
{
    protected $deviceService;

    public function __construct(DeviceService $deviceService)
    {
        $this->deviceService = $deviceService;
    }


    /**
     * @group Device
     *
     * Show Device
     *
     * @param ListRequest $request
     *
     * @urlParam id integer required  Id of device. Will be show Device. Example : 1
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function main($id)
    {
        return $this->safe(function () use ($id) {
            $devices = $this->deviceService->show($id);
            return $this->success('SHOW', $devices);
        });
    }
}
