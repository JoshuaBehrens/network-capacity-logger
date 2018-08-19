<?php

return [
    'executable' => env('MTR_EXECUTABLE'),
    'hostnames' => explode(';', env('MTR_HOSTNAMES')),
];
