<?php

namespace BayuDev\Digiflazz\Buyer;

use BayuDev\Digiflazz\Http\Request;

class Topup
{
    private $request;


    public function __construct(Request $request)
    {
        $this->request = $request;
    }


    public function send($buyerSkuCode, $customerNo, $refId, $message = null)
    {
        $payloads = [
            'buyer_sku_code' => $buyerSkuCode,
            'customer_no' => $customerNo,
            'ref_id' => $refId,
        ];

        if ($message) {
            $payloads['msg'] = $message;
        }

        $payloads = array_merge(
            $payloads,
            $this->request->credentials()->forAction('ref_id')
        );

        return $this->request
            ->withHeader('Accept', 'application/json')
            ->withHeader('Content-Type', 'application/json')
            ->post('/transaction', $payloads);
    }
}
