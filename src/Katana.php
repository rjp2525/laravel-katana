<?php

namespace Reno\Katana;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\HandlerStack;

class Katana
{
    /**
     * The Guzzle HTTP client instance.
     *
     * @var Client
     */
    protected Client $client;

    /**
     * The handler stack for the Guzzle client instance.
     *
     * @var HandlerStack
     */
    protected HandlerStack $stack;

    /**
     * Constructor
     *
     * @param \GuzzleHttp\Client|null $client
     */
    public function __construct(?Client $client = null)
    {
        $this->createHandler();
        $this->createClient($client);
    }

    /**
     * Create a new handler stack instance
     *
     * @return void
     */
    protected function createHandler(): void
    {
        $this->stack = HandlerStack::create();
    }

    protected function createClient(?Client $client): void
    {
        $key = $this->getApiKey();
        $version = $this->getApiVersion();

        $this->client = $client ?: new Client([
            'handler' => $this->stack,
            'base_uri' => "https://api.katanamrp.com/{$version}/",
            'headers' => [
                'Authorization' => "Bearer {$key}",
                'Accept'        => 'application/json'
            ]
        ]);
    }

    public function request(string $method, string $uri, array $query = [])
    {
        try {
            $response = $this->client->request($method, $uri, $query);

            return json_decode($response->getBody()->getContents(), true);
        } catch (GuzzleException $e) {
            throw new KatanaApiException($e);
        }
    }

    protected function getApiKey(): KatanaMissingConfigValueException|string
    {
        $key = config('katana.credentials.api_key');

        if (!$key) {
            throw new KatanaMissingApiKeyException('credentials.api_key');
        }

        return $key;
    }

    protected function getApiVersion(): KatanaMissingConfigValueException|string
    {
        $version = config('katana.api_version');

        if (!$version) {
            throw new KatanaMissingConfigValueException('api_version');
        }

        return $version;
    }
}
