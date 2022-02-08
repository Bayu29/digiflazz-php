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


    public function send($buyerSkuCode, $customerNo, $refId, $message)
    {
        $payloads = [
            'buyer_sku_code' => $buyerSkuCode,
            'customer_no' => $customerNo,
            'ref_id' => $refId,
            'msg' => $message,
        ];

        $payloads = array_merge(
            $payloads,
            $this->request->credentials()->forAction('ref_id')
        );

        return $this->request->post('/transaction', $payloads);
    }
}
