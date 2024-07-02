<?php

namespace App\Services\Url\Actions;

use App\Models\Url;
use App\Services\Url\Classes\UrlRepository;
use Illuminate\Support\Str;

readonly class GetShortUrlAction
{
    private const HASH_LENGTH = 6;

    public function __construct(
        private UrlRepository $urlRepository
    ) {
    }

    public function run(string $url): Url
    {
        $existingUrl = $this->urlRepository->getByUrl($url);

        if ($existingUrl !== null) {
            return $existingUrl;
        }

        $hash = $this->getUniqueHash($url);

        return $this->urlRepository->create($url, $hash);
    }

    private function getUniqueHash(string $url): string
    {
        $hash = substr(base64_encode($url), 0, self::HASH_LENGTH);

        if ($this->urlRepository->getByHash($hash) !== null) {
            return $this->getUniqueHash(Str::random(2) .$url . Str::random(2));
        }

        return $hash;
    }
}
