<?php

namespace BayuDev\Digiflazz\Buyer;

use BayuDev\Digiflazz\Http\Request;

class Status
{
    private $request;


    public function __construct(Request $request)
    {
        $this->request = $request;
    }


    public function prepaid($buyerSkuCode, $customerNo, $refId, $message)
    {
        // Entah ini maksudnya apa

        /**
         * Cek status dapat dilakukan dengan melakukan topup ulang
         * dengan ref_id yang sama pada transaksi sebelumnya.
         *
         * Silahkan ikuti petunjuk Topup untuk informasi Detail
         *
         * Mohon Perhatian
         *
         * Jangan pernah mencoba untuk melakukan Cek Status terhadap transaksi
         * yang sudah lewat 90 HARI karena hal tersebut akan menyebabkan pembuatan transaksi BARU.
         */
    }


    public function postpaid($buyerSkuCode, $customerNo, $refId, $message)
    {
        $payloads = [
            'commands' => 'status-pasca',
            'buyer_sku_code' => $buyerSkuCode,
            'customer_no' => $customerNo,
            'ref_id' => $refId,
            'msg' => $message,
        ];

        $payloads = array_merge(
            $payloads,
            $this->request->credentials()->forAction('ref_id')
        );

        // AWAS!
        // api endpoint tidak dijelaskan di dokumentasi digiflazz
        // Lalu harus hit kemana?? Entahlah,
        return $this->request
            ->withHeader('Accept', 'application/json')
            ->withHeader('Content-Type', 'application/json')
            ->post('/transaction', $payloads);
    }
}
