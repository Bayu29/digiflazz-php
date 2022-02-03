<?php
declare(strict_types=1);

namespace BayuDev\Digiflazz;

use BayuDev\Digiflazzz\Constant;
use BayuDev\Digiflazz\Traits\Setter;
use BayuDev\Digiflazz\Traits\Getter;

class Base 
{


    protected $environment;
    protected $apiKey;
    protected $username;
    protected $command;
    protected $secretKey;
    protected $webhookId;
    protected $endpoint;


    /**
     * Constructor set Environment
     */
    public function __construct($environment)
    {
        switch($environment) {
            case Constant::PRODUCTION:
                $this->apiKey = 
                break;
        }

    }
}
?>