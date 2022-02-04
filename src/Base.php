<?php

declare(strict_types=1);

namespace BayuDev\Digiflazz;

use BayuDev\Digiflazzz\Constant;
use BayuDev\Digiflazz\Traits\Setter;
use BayuDev\Digiflazz\Traits\Getter;

class Base
{
    use Setter;
    use Getter;

    /**
     * Set Environment API
     */
    protected $environment;

    /**
     * Set Api Key
     */
    protected $apiKey;

    /**
     * Set Username
     */
    protected $username;

    /**
     * Set Command for request API
     */
    protected $command;

    /**
     * Set Secret Key
     */
    protected $secretKey;

    /**
     * Set WebhookId
     */
    protected $webhookId;

    /**
     * Set Endpoint API
     */
    protected $endpoint;
}
