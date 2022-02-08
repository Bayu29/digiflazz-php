<?php

namespace BayuDev\Digiflazz\Buyer;

use BayuDev\Digiflazz\Http\Request;

class Balance
{
    private $request;


    public function __construct(Request $request)
    {
        $this->request = $request;
    }


    public function check()
    {
        $payloads = ['cmd' => 'deposit'];
        $payloads = array_merge(
            $payloads,
            $this->request->credentials()->forAction('depo')
        );

        return $this->request
            ->withHeader('Accept', 'application/json')
            ->withHeader('Content-Type', 'application/json')
            ->post('/cek-saldo', $payloads);
    }
}
