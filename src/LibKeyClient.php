<?php

namespace BCLib\LibKeyClient;

use Symfony\Component\HttpClient\CurlHttpClient;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Contracts\HttpClient\ResponseInterface;

class LibKeyClient
{
    private string $library_id;
    private string $libkey_apikey;
    private HttpClientInterface $http_client;

    /**
     * Builder function
     *
     * Builds a LibKey client. If $http_client is omitted, it will create a new CurlHttpClient.
     */
    public static function build(
        string $library_id,
        string $libkey_apikey,
        HttpClientInterface $http_client = null
    ): LibKeyClient {
        $http_client = $http_client ?? new CurlHttpClient();
        return new LibKeyClient($library_id, $libkey_apikey, $http_client);
    }

    public function __construct(
        string $library_id,
        string $libkey_apikey,
        HttpClientInterface $http_client
    ) {
        $this->library_id = $library_id;
        $this->libkey_apikey = $libkey_apikey;
        $this->http_client = $http_client;
    }

    /**
     * Send a request for a DOI
     *
     * Returns a ResponseInterface instead of parsed text so that multiple requests can be made concurrently to
     * different services using the Symfony HttpClientInterface.
     *
     * @throws LibKeyLookupException
     */
    public function request(string $doi): ResponseInterface
    {
        $uri = "https://public-api.thirdiron.com/public/v1/libraries/$this->library_id/articles/doi/$doi?include=journal";
        $request_options = [
            'auth_bearer' => $this->libkey_apikey,
            'headers' => [
                'Accept' => 'application/json'
            ]
        ];
        try {
            return $this->http_client->request('GET', $uri, $request_options);
        } catch (TransportExceptionInterface $e) {
            throw new LibKeyLookupException("Error fetching from LibKey <$uri>", $e->getCode(), $e);
        }
    }

    /**
     * Parse a LibKey response
     *
     * @throws LibKeyLookupException|null
     */
    public function parse(ResponseInterface $response): ?LibKeyResponse
    {
        try {
            if ($response->getStatusCode() === 200) {
                return LibKeyParser::parse($response->getContent());
            }
        } catch (ClientExceptionInterface|RedirectionExceptionInterface|ServerExceptionInterface|TransportExceptionInterface $e) {
            $error_url = $response->getInfo()['url'];
            throw new LibKeyLookupException("Error fetching from LibKey <$error_url>", $e->getCode(), $e);
        }

        return null;
    }

    /**
     * Get the http client
     *
     * HttpClientInterface supports asynchronous requests, so you can inject the http client into other
     * objects to issue concurrent requests.
     *
     * @return HttpClientInterface
     */
    public function getHttpClient(): HttpClientInterface
    {
        return $this->http_client;
    }
}