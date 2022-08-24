<?php

namespace App\Services;

use App\Repositories\DeviceRepository;

/**
 * Class DeviceService
 * @package App\Services
 * @author
 */
class DeviceService extends Services
{
    /**
     * @var \APP\Repositories\DeviceRepository
     */
    protected $deviceRepository;

    public function __construct(DeviceRepository $deviceRepository)
    {
        $this->deviceRepository = $deviceRepository;
    }
}
