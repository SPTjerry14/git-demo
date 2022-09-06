<?php

namespace App\Http\Controllers\Api\Device;

use App\Http\Controllers\APIController;
use App\Http\Requests\Device\ListRequest;
use App\Services\DeviceService;

/**
 * Class ListController
 * @package App\Http\Controllers\Api\Device
 * @author
 */
class ListController extends APIController
{
    protected $deviceService;

    public function __construct(DeviceService $deviceService)
    {
        $this->deviceService = $deviceService;
    }


    /**
     * @group Device
     *
     * List Device
     *
     * @param ListRequest $request
     *
     * @bodyParam per_page integer . Example : 123
     *
     * @return \Illuminate\Http\JsonResponse
     */


    public function main(ListRequest $request)
    {
        return $this->safe(function () use ($request) {
            $request->validated();
            $devices = $this->deviceService->list($request->per_page);
            return $this->success('PAGINATED', $devices);
        });
    }
}
