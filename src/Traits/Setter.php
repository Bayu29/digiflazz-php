<?php

declare(strict_types=1);

namespace BayuDev\Digiflazz\Traits;

trait Setter
{
    /**
     * set Environment Api
     *
     * @param string $environment
     * @return void
     */
    public function setEnvironment($environment)
    {
        $this->environment = $environment;
        return $this;
    }

    /**
     * Set ApiKey
     *
     * @param string $apiKey
     * @return void
     */
    public function setApiKey(string $apiKey)
    {
        $this->apiKey = $apiKey;
        return $this;
    }

    /**
     * Set Username
     *
     * @param string $username
     * @return void
     */
    public function setUsername(string $username)
    {
        $this->username = $username;
        return $this;
    }

    /**
     * Set Command
     *
     * @param string $command
     * @return void
     */
    public function setCommand(string $command)
    {
        $this->command = $command;
        return $this;
    }

    /**
     * Set WebhookId
     *
     * @param string $webhookId
     * @return void
     */
    public function setWebhookId(string $webhookId)
    {
        $this->webhookId = $webhookId;
        return $this;
    }

    /**
     * Set SecretKey
     *
     * @param string $secretKey
     * @return void
     */
    public function setSecretkey(string $secretKey)
    {
        $this->secretKey = $secretKey;
        return $this;
    }

    /**
     * Set Endpoint
     *
     * @param string $endpoint
     * @return void
     */
    public function setEndPoint(string $endpoint)
    {
        $this->endpoint = $endpoint;
        return $this;
    }

}
?>
