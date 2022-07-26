<?php

namespace App\Exceptions;

use Exception;

class CustomException extends Exception
{
    /**
     * @var mixed
     */
    protected $data;

    /**
     * Create a custom exception
     *
     * @param string $configName name of error config defined in response-code.php
     * @param array|string|int $attachData Attach data to send with response
     */
    public function __construct(string $configName, $attachData)
    {
        $config = config("response-code.ERROR.$configName");
        parent::__construct($config['message'], $config['code']);
        $this->data = $attachData;
    }

    public function getData()
    {
        return $this->data;
    }
}
