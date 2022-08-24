<?php

return [
    'HTTP' => ['SUCCESS' => 200, 'ERROR' => 400],
    'SUCCESS' => [ //[1-299]
        // [GET 1-20]
        'INDEX' => ['code' => 1, 'message' => 'INDEX'],
        'SHOW' => ['code' => 2, 'message' => 'SHOW'],
        'UPDATED' => ['code' => 3, 'message' => 'updated success'],
        'DELETED' => ['code' => 4, 'message' => 'deleted success'],
        //
        'CREATED' => ['code' => 20, 'message' => 'CREATED'],
        //
        'LOGOUT' => ['code' => 40, 'message'=> 'LOGOUT']
    ],
    'ERROR' => [ // [300 - ...]
        // [WARNING 300-399]
        //
        // [COMMON 400, 420]
        'BAD_PARAMETERS' => ['code' => 400, 'message' => 'BAD PARAMETERS'],
        "NOT_FOUND" => ["code" => 404, "message" => "NOT FOUND"],
        //
        "EXISTED" => ["code" => 422, "message" => "EXISTED"],
    ],


];
