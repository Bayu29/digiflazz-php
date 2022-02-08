<?php

namespace BayuDev\Digiflazz\Buyer;

use BayuDev\Digiflazz\Http\Request;
use stdClass;

class Webhook
{
    private $request;


    public function __construct(Request $request)
    {
        $this->request = $request;
    }


    public function listen($secret)
    {
        $data = file_get_contents('php://input');
        $signature = hash_hmac('sha1', $data, $secret);

        if (isset($_SERVER['X-Hub-Signature'])
        && strval($_SERVER['X-Hub-Signature']) !== 'sha1=' . $signature) {
            $response = new stdClass();
            $headers = [];

            if (function_exists('getallheaders')) {
                $headers = getallheaders();
            } else {
                foreach ($_SERVER as $name => $value) {
                    if (substr($name, 0, 5) == 'HTTP_') {
                        $key = strtolower(str_replace('_', ' ', substr($name, 5)));
                        $key = str_replace(' ', '-', ucwords($key));
                        $headers[$key] = $value;
                   }
               }
            }

            $response->headers = $headers;
            $response->body = json_decode($data);

            return json_encode($response);
        }
    }


    public function ping($webhookId)
    {
        return $this->request
            ->withHeader('Accept', '*/*')
            ->withHeader('Content-Length', 0)
            ->post('/' . $webhookId . '/ping');
    }
}
