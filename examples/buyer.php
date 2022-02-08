<?php

include '../src/Http/Credentials.php';
include '../src/Http/Request.php';
include '../src/Buyer/Balance.php';

use BayuDev\Digiflazz\Http\Credentials;
use BayuDev\Digiflazz\Http\Request;
use BayuDev\Digiflazz\Buyer\Balance;

$username = 'lucujeoENN1D';
$apiKey = 'dev-60b70f80-6ec7-11eb-9c86-a543cb8527d0';

$credentials = new Credentials($username, $apiKey);

$isProduction = false;

$request = new Request($credentials, $isProduction);

// Jika perlu curl option tambahan, misal untuk mematikan/menghidupkan SSL
$request
    ->withCurlOption(CURLOPT_SSL_VERIFYPEER, 0)
    ->withCurlOption(CURLOPT_SSL_VERIFYHOST, 0);

// Jika perlu http header tambahan
// $request
//     ->withHeader('Accept-Encoding', 'gzip, deflate')
//     ->withHeader('SameSite', 'Lax');

// Buyer: Check balance (cek saldo)
$balance = (new Balance($request))->check();

print_r($balance);

