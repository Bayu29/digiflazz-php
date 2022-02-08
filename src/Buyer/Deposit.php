<?php

namespace BayuDev\Digiflazz\Buyer;

use BayuDev\Digiflazz\Http\Request;

class Deposit
{
    private $request;


    public function __construct(Request $request)
    {
        $this->request = $request;
    }


    private function add($amount, $bankName, $ownerName)
    {
        $payloads = [
            'amount' => $type,
            'Bank' => $bank,
            'owner_name' => $ownerName,
        ];

        $payloads = array_merge(
            $payloads,
            $this->request->credentials()->forAction('deposit')
        );

        return $this->request
            ->withHeader('Accept', 'application/json')
            ->withHeader('Content-Type', 'application/json')
            ->post('/deposit', $payloads);
    }
}
