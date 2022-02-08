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

        return $this->request->post('/cek-saldo', $payloads);
    }
}
