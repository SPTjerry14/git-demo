<?php

namespace App\Repositories;

use App\Models\Device;
use App\Models\User;
use Illuminate\Support\Facades\DB;

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

    public function list()
    {
        $list = DB::table('devices')->get();
        return $list;
    }
}
