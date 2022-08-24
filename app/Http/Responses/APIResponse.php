<?php

namespace App\Http\Responses;

class APIResponse
{
    public function __construct()
    {
        //
    }

    /**
     * Create a new success api response
     *
     * @param string $codeName Custom response code name defined in response-code.SUCCESS
     * @param mixed $data Custom data attach to response
     * @param string $message Custom message attach to response
     */
    public static function success(string $codeName, $data = null, $message = null)
    {
        return self::standard('SUCCESS', $codeName, $data, $message);
    }

    /**
     * Create a new error api response
     *
     * @param string $codeName Custom response code name defined in response-code.ERROR
     * @param mixed $data Custom data attach to response
     * @param string $message Custom message attach to response
     */
    public static function error(string $codeName, $data = null, $message = null)
    {
        return self::standard('ERROR', $codeName, $data, $message);
    }

        /**
     * Make a raw json response
     *
     * @param 'SUCCESS'|'ERROR' $status
     * @param string $codeName Name of response code defined in response-code.$status
     * @param mixed $data Custom data attach to response
     * @param string $message Custom message attach to response
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public static function standard(string $status, string $codeName, $data = null, $message = null)
    {
        $responseData = is_null($data) ? [] : ['data' => $data];
        $responseData = is_null($message) ? $responseData : array_merge($responseData, ['message' => $message]);
        $response = array_merge(config("response-code.$status.$codeName"), $responseData);
        return response()->json($response, config("response-code.HTTP.$status"));
    }

    /**
     * Make a raw json response
     *
     * @param 'SUCCESS'|'ERROR' $status
     * @param string $code Custom response code defined in response-code
     * @param mixed $data Custom data attach to response
     * @param string $message Custom message attach to response
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public static function raw(string $status, int $code, $data = null, $message = null)
    {
        return response()->json(compact('code', 'data', 'message'), config("response-code.HTTP.$status"));
    }
}
