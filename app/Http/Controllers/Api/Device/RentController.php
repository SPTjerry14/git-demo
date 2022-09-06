<?php

namespace App\Http\Controllers\Api\Device;

use App\Http\Controllers\APIController;
use App\Http\Requests\Device\RentedRequest;
use App\Services\DeviceService;

/**
 * Class RentedController
 * @package App\Http\Controllers\Api\Device
 * @author
 */
class RentController extends APIController
{
    protected $deviceService;

    public function __construct(DeviceService $deviceService)
    {
        $this->deviceService = $deviceService;
    }

  
    /**
     * @group Device
     *
     * Rent Device
     *
     * @param RentRequest $request
     *
     * @bodyParam user_id integer required  User_id of device. Example : 1
     * @bodyParam device_id integer required Device_id of device. Example : 2
     * @bodyParam rented_at date Rented_at of device. Example : 2022-09-05
     *
     * @return \Illuminate\Http\JsonResponse
     */

    public function main(\App\Http\Requests\Device\RentRequest $request)
    {
        return $this->safe(function () use ($request) {
            $params =$request->validated();
            $result = $this->deviceService->rent($request->id, $params);
            return $this->success('ATTACHED', $result);
        });
    }
}
