<?php

namespace App\Services\SafeBrowsing\Classes;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

class SafeBrowsingApiClient
{
    private const API_URL        = 'https://safebrowsing.googleapis.com/v4/';
    private const LOOKUP_THREATS = 'threatMatches:find';
    private string $apiKey;


    public function __construct()
    {
        $this->apiKey = config('services.safe_browsing.api_key');
    }

    public function lookupUrl(string $url): Response
    {
        return Http::post(
            $this->getLookupUrl(),
            $this->getLookupRequestBody($url)
        );
    }

    private function getLookupUrl(): string
    {
        return self::API_URL . self::LOOKUP_THREATS . '?key=' . $this->apiKey;
    }

    /**
     * @param string $url
     * @return array
     */
    private function getLookupRequestBody(string $url): array
    {
        return [
            'client'     => [
                'clientId'      => 'laravel-safe-browsing',
                'clientVersion' => '1.0.0',
            ],
            'threatInfo' => [
                'threatTypes'      => [
                    'MALWARE',
                    'SOCIAL_ENGINEERING',
                    'UNWANTED_SOFTWARE',
                    'POTENTIALLY_HARMFUL_APPLICATION'
                ],
                'platformTypes'    => ['ANY_PLATFORM'],
                'threatEntryTypes' => ['URL'],
                'threatEntries'    => [
                    ['url' => $url]
                ],
            ]
        ];
    }
}
