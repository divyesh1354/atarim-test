<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class UrlShortenerService
{
    private $baseUrl = 'http://short.est/';
    private $keyLength = 6;

    public function encode(string $originalUrl)
    {
        // Check if URL already exists
        $existingKey = Cache::get("url_$originalUrl");
        if ($existingKey) {
            return response()->json(['short_url' => $this->baseUrl . $existingKey], 200);
        }

        // Generate unique key
        do {
            $key = Str::random($this->keyLength);
        } while (Cache::has("key_$key"));

        // Store in cache
        Cache::put("key_$key", $originalUrl);
        Cache::put("url_$originalUrl", $key);

        return response()->json(['short_url' => $this->baseUrl . $key], 200);
    }

    public function decode(string $shortUrl)
    {
        // Fetch key from shortener URL
        $key = str_replace($this->baseUrl, '', $shortUrl);

        // Fetch original URL using key from Cache
        $originalUrl = Cache::get("key_$key");

        if (!$originalUrl) {
            return response()->json(['error' => 'Short URL not found'], 404);
        }

        return response()->json(['original_url' => $originalUrl], 200);
    }
}
