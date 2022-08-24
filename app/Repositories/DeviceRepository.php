<?php

namespace App\Repositories;

use App\Models\Device;

/**
 * Class DeviceRepository
 * @package App\Repositories
 * @author
 */
class DeviceRepository extends Repository
{
    public function __construct(Device $device)
    {
        $this->model = $device;
    }
}
