<?php

namespace App\Traits\Integrations;

use GuzzleHttp\Exception\GuzzleException;
use Exception;
use Illuminate\Support\Facades\Log;

class Characters
{
    public function __construct()
    {
        $this->url   = config('services.characters.url');
    }
    public function getCharacters()
    {
        try {
            $context = stream_context_create(array('http' => array('protocol_version' => '1.1')));
            $json         = file_get_contents($this->url . '/api/characters', false, $context);
            return $json;
        } catch (Exception | GuzzleException $exception) {
            Log::error("error reading file", [$exception]);
            return $json = null;
        }
    }
}
