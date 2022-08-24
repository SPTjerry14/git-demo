<?php

namespace App\Http\Controllers;

use \App\Http\Responses\APIResponse;

class APIController extends Controller
{
    public function __construct()
    {
        //
    }

    /**
     * Safe zone to process
     *
     * @param \Closure $progress All logic of a controller will be defined in here
     * @param \Closure $onError Custom exception handler
     */
    protected function safe(\Closure $progress, \Closure $onError = null)
    {
        try {
            return $progress();
        } catch (\App\Exceptions\CustomException $e) {
            return APIResponse::raw('ERROR', $e->getCode(), $e->getMessage(), $e->getData());
        } catch (\Exception $e) {
            return is_null($onError) ? APIResponse::error('UNKNOWN_ERROR') : $onError($e);
        }
    }

    /**
     * Create a new success api response
     *
     * @param string $codeName Custom response code name defined in response-code.SUCCESS
     * @param mixed $data Custom data attach to response
     * @param string $message Custom message attach to response
     */
    protected function success(string $codeName, $data = null, $message = null)
    {
        return APIResponse::success($codeName, $data, $message);
    }

    /**
     * Create a new error api response
     *
     * @param string $codeName Custom response code name defined in response-code.ERROR
     * @param mixed $data Custom data attach to response
     * @param string $message Custom message attach to response
     */
    protected function error(string $codeName, $data = null, $message = null)
    {
        return APIResponse::error($codeName, $data, $message);
    }
}
