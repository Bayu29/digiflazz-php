<?php

namespace BayuDev\Digiflazz\Http;

class Request
{
    const BASE_ENDPOINT = 'https://api.digiflazz.com/v1';

    private $credentials;
    private $isProduction = false;
    private $headers = [];
    private $curlOptions = [];


    public function __construct(Credentials $credentials, $isProduction = false)
    {
        $this->credentials = $credentials;
        $this->isProduction = $isProduction;
    }


    public function withHeader($key, $value)
    {
        $this->headers[$key] = $value;
        return $this;
    }


    public function withCurlOption($key, $value)
    {
        $this->curlOptions[$key] = $value;
        return $this;
    }


    public function post($endpoint, array $payloads)
    {
        $endpoint = self::BASE_ENDPOINT . '/' . ltrim($endpoint, '/');

        $payloads['testing'] = ! $this->isProduction;

        // // Timpa header 'Accept' dan 'Content-Type' dengsn nilai default
        // $this->headers = array_change_key_case($this->headers, CASE_LOWER);
        // $this->headers['accept'] = 'application/json';
        // $this->headers['content-type'] = 'application/json';

        // // Kembalikan header keys ke bentuk Title-Case.
        // $this->headers = array_combine(array_map(function ($key) {
        //     return str_replace(' ', '-', ucwords(str_replace('-', ' ', strtolower($key))));
        // }, array_keys($this->headers)), array_values($this->headers));

        $curlOptions = [
            CURLOPT_URL => $endpoint,
            CURLOPT_HTTPHEADER => $this->headers,
            CURLOPT_HEADER => false,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => json_encode($payloads),
            CURLOPT_RETURNTRANSFER => true,
        ];

        foreach ($this->curlOptions as $key => $value) {
            $curlOptions[$key] = $value;
        }

        $this->curlOptions = $curlOptions;

        // Mulai request.
        $ch = curl_init();

        curl_setopt_array($ch, $this->curlOptions);

        $response = curl_exec($ch);
        $errno = curl_errno($ch);
        $error = curl_error($ch);
        $headers = curl_getinfo($ch);

        $response = [
            'request' => [
                'payloads' => $payloads,
                'headers' => $this->headers,
                'curl_error' => $error,
                'curl_errno' => $errno,
            ],
            'response' => [
                'body' => json_decode($response),
                'headers' => $headers,
            ],
        ];

        return json_encode($response, JSON_BIGINT_AS_STRING | JSON_PRETTY_PRINT);
    }


    public function credentials()
    {
        return $this->credentials;
    }
}
