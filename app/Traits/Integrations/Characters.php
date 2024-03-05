<?php

namespace App\Traits\Integrations;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;
use GuzzleHttp\Exception\RequestException;
use Symfony\Component\HttpFoundation\Response;

class Characters
{
    protected $httpClient;
    protected $url;

    public function __construct($httpClient = null)
    {
        $this->httpClient = $httpClient ?: new Client();
        $this->url   = config('services.characters.url');
    }

    public function getCharacters()
    {
        try {
            $response = $this->httpClient->request('GET', $this->url . '/api/characters');
            $responseData = json_decode($response->getBody()->getContents(), true);
            if (null === $responseData) {
                return [
                    'message' => "Characters API returned an error: ",
                    'status_code' => Response::HTTP_NOT_FOUND
                ];
            }
            return $responseData;
        } catch (RequestException $exception) {
            $statusCode = $exception->hasResponse() ?
                $exception->getResponse()->getStatusCode() :
                Response::HTTP_NOT_FOUND;
            $message = $exception->hasResponse() ?
                "Characters API returned an error: " . $exception->getResponse()->getBody()->getContents() :
                "Error reading file: " . $exception->getMessage();

            Log::error($message);

            return [
                'message' => $message,
                'status_code' => $statusCode
            ];
        }
    }
}
