<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Traits\Integrations\Characters;
use Illuminate\Support\Facades\Config;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use Symfony\Component\HttpFoundation\Response as ResponseCode;

class CharactersTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        Config::set('services.characters.url', 'https://api.example.com');
    }

    /**
     * @test
     */
    public function it_can_get_characters_from_api()
    {
        $fakeData = [
            ['name' => 'Character 1'],
            ['name' => 'Character 2'],
        ];

        $httpClient = new Client([
            'handler' => \GuzzleHttp\HandlerStack::create(new \GuzzleHttp\Handler\MockHandler([
                new Response(ResponseCode::HTTP_OK, [], json_encode($fakeData))
            ]))
        ]);

        $characters = new Characters($httpClient);

        $this->assertEquals($fakeData, $characters->getCharacters());
    }

    /**
     * @test
     */
    public function it_returns_error_array_on_failed_request()
    {
        $httpClient = new Client([
            'handler' => \GuzzleHttp\HandlerStack::create(new \GuzzleHttp\Handler\MockHandler([
                new Response(ResponseCode::HTTP_NOT_FOUND)
            ]))
        ]);

        $characters = new Characters($httpClient);

        $response = $characters->getCharacters();
        $this->assertIsArray($response);
        $this->assertArrayHasKey('message', $response);
        $this->assertArrayHasKey('status_code', $response);
        $this->assertEquals('Characters API returned an error: ', $response['message']);
        $this->assertEquals(ResponseCode::HTTP_NOT_FOUND, $response['status_code']);
    }
}
