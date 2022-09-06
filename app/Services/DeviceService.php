<?php

namespace App\Services;

use App\Repositories\DeviceRepository;
use Illuminate\Support\Facades\DB;

/**
 * Class DeviceService
 * @package App\Services
 * @author
 */
class DeviceService extends DBServices
{
    /**
     * @var \APP\Repositories\DeviceRepository
     */
    protected $deviceRepository;

    public function __construct(DeviceRepository $deviceRepository)
    {
        $this->deviceRepository = $deviceRepository;
    }

    /**
     * List a Device record
     *
     * @param array $params per_page to show device record
     */

    public function list(int $perPage = null)
    {
        if (is_null($perPage)) {
            $perPage = 10;
        } else {
            $perPage = min($perPage, 20);
        }
        $devices = $this->deviceRepository->find([], "*", $perPage);
        return $devices;
    }

    /**
     * Delete a Device record
     *
     * @param int $id Id of device will be delete
     *
     */
    public function destroy($id)
    {
        return $this->deviceRepository->destroy($id);
    }

    /**
     * Create a UserDevice record
     *
     * @param int $id Id of device will be rented
     * @param array $params [
     *  'user_id' => int,
     *  'rented_at' => ?datetime,
     *  'returned_at' => ?datetime
     * ]
     */
    public function rent(int $id, array $params)
    {
        if (!array_key_exists('rented_at', $params)) {
            $params['rented_at'] = \Carbon\Carbon::today()->toDateString();
        }
        $device = $this->deviceRepository->first(['id' => $id], ['id', 'code_name']);
        $attachParams = collect($params)->only(['rented_at', 'returned_at'])->toArray();
        $attachParams['code_name'] = $device->code_name;
        return $device->user()->attach([
            $params['user_id'] => $attachParams
        ]);
    }
    /**
     * Update a UserDevice record
     *
     * @param int $id Id of device will be returned
     * @param array $params [
     *  'rented_at' => ?datetime,
     *  'returned_at' => ?datetime
     * ]
     */
    public function giveback(int $id, array $params)
    {
        if (!array_key_exists('returned_at', $params)) {
            $params['returned_at'] = \Carbon\Carbon::today()->toDateString();
        }
        $result = DB::table('user_device')->where('device_id', $id);
        if (isset($result)) {
            $result->update(['returned_at' => $params['returned_at']]);
        }
        return $result->get();
    }

    /**
     * Add a Device record
     *
     * @param array $params [
     *  'code_name' => integer,
     *  'name' => string,
     *  'price'=>number,
     *  'status'=>new|using|damge
     * ]
     */
    public function store(array $params)
    {
        return $this->deviceRepository->store($params);
    }

    /**
     * Update a Device record
     *
     * @param int $id Id of device will be update
     * @param array $params [
     *  'code_name' => integer,
     *  'name' => string,
     *  'price'=>number,
     *  'status'=>new|using|damge
     * ]
     */

    public function update(array $params, int $id)
    {
        return $this->deviceRepository->update($params, $id);
    }

    /**
     * Update a UserDevice record
     *
     * @param int $id Id of device will be show device
     */

    public function show(int $id)
    {
        return $this->deviceRepository->show($id);
    }
}
