<?php

namespace App\Services\SafeBrowsing\Actions;

use App\Services\SafeBrowsing\Classes\SafeBrowsingApiClient;
use Illuminate\Support\Facades\Log;

readonly class CheckSafeUrlAction
{
    public function __construct(
        private SafeBrowsingApiClient $safeBrowsingApiClient
    ) {
    }

    /**
     * Return true if the URL is safe
     *
     * @param string $url
     * @return bool
     * @throws \Exception
     */
    public function run(string $url): bool
    {
        $response = $this->safeBrowsingApiClient->lookupUrl($url);

        if ($response->failed()) {
            Log::error('Safe Browsing API error: ' . $response->json('error.message'));
            throw new \Exception('Could not check the URL for safety');
        }


        return empty($response->json('matches'));
    }
}
