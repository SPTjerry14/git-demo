<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\APIController;
use App\Http\Requests\Auth\DeviceRequest;
use App\Services\DeviceService;

/**
 * Class AddDeviceController
 * @package App\Http\Controllers\Api\Auth
 * @author
 */
class AddDeviceController extends APIController
{
    /**
     * @var \App\Services\DeviceService
     */
    protected $deviceService;
    public function __construct(DeviceService $deviceService)
    {
        $this->deviceService = $deviceService;
    }

    public function main(DeviceRequest $request)
    {
        $params = $request->all();
        dd($params);
    }
}
