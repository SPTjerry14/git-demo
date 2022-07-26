<?php

return [
    'HTTP' => ['SUCCESS' => 200, 'ERROR' => 400],
    'SUCCESS' => [ //[1-299]
        // [GET 1-20]
        'INDEX' => ['code' => 1, 'message' => 'INDEX']
    ],
    'ERROR' => [ // [300 - ...]
        // [WARNING 300-399]
        //
        // [COMMON 400, 420]
        'BAD_PARAMETERS' => ['code' => 400, 'message' => 'BAD PARAMETERS']
    ]
];
