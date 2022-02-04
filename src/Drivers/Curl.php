<?php

declare(strict_types=1);

namespace BayuDev\Digiflazz\Drivers;

use BayuDev\Digiflazz\Base;
use BayuDev\Digiflazz\Constant;

class Curl extends Base
{
    public function request(string $method, array $payload = [])
    {
        if (empty($payload)) {
        }

        $ch = curl_init();
        curl_setopt_array($ch, [
            CURLOPT_FRESH_CONNECT => true,
            CURLOPT_URL => rtrim(Constant::ENDPOINT, '/') . '/' . ltrim($this->endpoint, '/'),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HEADER => false,
            CURLOPT_HTTPHEADER => array(
                'Content-type: application/json',
                'Accept: application/json'
            ),
            CURLOPT_POST => true,
            CURLOPT_IPRESOLVE => CURL_IPRESOLVE_V4,
            CURLOPT_CONNECTTIMEOUT => 20,
            CURLOPT_TIMEOUT => 120,
        ]);

        curl_exec($ch);
        curl_errno($ch);
        curl_error($ch);
        curl_close($ch);
    }
}
