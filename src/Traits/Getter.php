<?php
declare(strict_types=1);

namespace BayuDev\Digiflazz\Traits;

use BayuDev\Digiflazz\Traits\Setter;
use BayuDev\Digiflazz\Exceptions\DigiflazzSignatureException;

trait Getter
{
    /**
     * Get Current Environment
     *
     * @return void
     */
    public function environment()
    {
        return $this->enviroment ?? null;
    }

    /**
     * Get Api Key
     *
     * @return void
     */
    public function apiKey()
    {
        return $this->apiKey ?? null;
    }

    /**
     * Get Username Api
     *
     * @return void
     */
    public function username()
    {
        return $this->username ?? null;
    }

    /**
     * Get Command
     *
     * @return void
     */
    public function command()
    {
        return $this->command ?? null;
    }
    
    /**
     * Get WebhookId
     *
     * @return void
     */
    public function webhookId()
    {
        return $this->webhookId ?? null;
    }

    /**
     * Get Secret Key
     *
     * @return void
     */
    public function secretKey()
    {
        return $this->secretKey ?? null;
    }

    /**
     * Get Endpoint
     *
     * @return void
     */
    public function endpoint()
    {
        return $this->endpoint ?? null;
    }

    protected function signature()
    {
        if (is_null( $this->username() )) {
            throw new DigiflazzSignatureException('Please Insert Username Digiflazz');
        }

        if (is_null( $this->apiKey() )) {
            throw new DigiflazzSignatureException('Please Insert ApiKey');
        }

        if (is_null( $this->command() )) {
            throw new DigiflazzSignatureException('Please Insert command');
        }
        
        $signature = md5( $this->username() . $this->apiKey() . $this->command() );
        return $signature;
    }
}
?>