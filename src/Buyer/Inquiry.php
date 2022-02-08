<?php

namespace BayuDev\Digiflazz\Buyer;

use BayuDev\Digiflazz\Http\Request;

class Inquiry
{
    private $request;


    public function __construct(Request $request)
    {
        $this->request = $request;
    }


    private function validatePln($customerNo)
    {
        $payloads = [
            'commands' => 'pln-subscribe',
            'customer_no' => $customerNo,
        ];

        return $this->request
            ->withHeader('Accept', 'application/json')
            ->withHeader('Content-Type', 'application/json')
            ->post('/deposit', $payloads);
    }
}
