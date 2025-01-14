<?php

namespace App\Http\Controllers;

use App\Http\Requests\DecodeURLRequest;
use App\Http\Requests\EncodeURLRequest;
use App\Services\UrlShortenerService;

class UrlShortenerController extends Controller
{
    private $urlShortenerService;

    /**
     * Injecting dependency of URL Service
     */
    public function __construct(UrlShortenerService $urlShortenerService)
    {
        $this->urlShortenerService = $urlShortenerService;
    }

    /**
     * Encoding URL
     */
    public function encode(EncodeURLRequest $request)
    {
        return $this->urlShortenerService->encode($request->url);
    }

    /**
     * Decoding URL
     */
    public function decode(DecodeURLRequest $request)
    {
        return $this->urlShortenerService->decode($request->short_url);
    }
}
