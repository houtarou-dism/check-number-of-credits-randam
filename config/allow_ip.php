<?php

/*
 * CheckIpミドルウェアで使用するホワイトリスト
 *
 */

return[
    'ip' => [
        env('ALLOW_IP_01', '0.0.0.0'),
        env('ALLOW_IP_02', '0.0.0.0'),
        env('ALLOW_IP_03', '0.0.0.0'),
    ],
];
