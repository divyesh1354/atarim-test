<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Cache;
use Tests\TestCase;

class UrlShortenerTest extends TestCase
{
    public function test_encode_url()
    {
        $response = $this->postJson('/api/encode', [
            'url' => 'https://laravel.com',
        ]);

        $response->assertStatus(200)
            ->assertJsonStructure(['short_url']);

        $this->assertNotNull(Cache::get('url_https://laravel.com'));
    }

    public function test_decode_url()
    {
        $key = '123456';
        Cache::put("key_$key", 'https://laravel.com');
        Cache::put("url_https://laravel.com", $key);

        $response = $this->postJson('/api/decode', [
            'short_url' => "http://short.est/{$key}",
        ]);

        $response->assertStatus(200)
            ->assertJson([
                'original_url' => 'https://laravel.com',
            ]);
    }

    public function test_decode_nonexistent_url()
    {
        $response = $this->postJson('/api/decode', [
            'short_url' => 'http://short.est/123123',
        ]);

        $response->assertStatus(404)
            ->assertJson([
                'error' => 'Short URL not found',
            ]);
    }
}
