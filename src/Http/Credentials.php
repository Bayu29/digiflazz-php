<?php

namespace BayuDev\Digiflazz\Http;

class Credentials
{
    private $username;
    private $apiKey;

    public function __construct($username, $apiKey)
    {
        $this->username = $username;
        $this->apiKey = $apiKey;
    }


    public function forAction($action)
    {
        return [
            'username' => $this->username,
            'sign' => md5($this->username . $this->apiKey . $action),
        ];
    }
}
