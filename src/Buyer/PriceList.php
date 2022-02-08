<?php

namespace BayuDev\Digiflazz\Buyer;

use BayuDev\Digiflazz\Http\Request;

class PriceList
{
    private $request;


    public function __construct(Request $request)
    {
        $this->request = $request;
    }


    public function prepaid($buyersProductCode = null)
    {
        return $this->fetch('prepaid', $buyersProductCode);
    }


    public function postpaid($buyersProductCode = null)
    {
        return $this->fetch('pasca', $buyersProductCode);
    }


    private function fetch($type, $buyersProductCode = null)
    {
        $payloads = ['cmd' => $type];

        if ($buyersProductCode) {
            $payloads['code'] = $buyersProductCode;
        }

        $payloads = array_merge(
            $payloads,
            $this->request->credentials()->forAction('pricelist')
        );

        return $this->request
            ->withHeader('Accept', 'application/json')
            ->withHeader('Content-Type', 'application/json')
            ->post('/price-list', $payloads);
    }
}
