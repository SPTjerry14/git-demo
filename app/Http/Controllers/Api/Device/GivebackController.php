<?php

namespace App\Http\Controllers\Api\Device;

use App\Services\DeviceService;
use App\Http\Controllers\APIController;

/**
 * Class RepayController
 * @package App\Http\Controllers\Api\Device
 * @author
 */
class GivebackController extends APIController
{
    protected $deviceService;

    public function __construct(DeviceService $deviceService)
    {
        $this->deviceService = $deviceService;
    }
    /**
     * @group Device
     *
     * Giveback Device
     *
     * @param GivebackRequest $request
     *
     *
     * @return \Illuminate\Http\JsonResponse
     */

    public function main(\App\Http\Requests\Device\GivebackRequest $request)
    {
        return $this->safe(function () use ($request) {
            $params =$request->validated();
            $result = $this->deviceService->giveback($request->id, $params);
            return $this->success('UPDATED', $result);
        });
    }
}
