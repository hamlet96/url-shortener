<?php

namespace App\Services\Url\Classes;

use App\Models\Url;

class UrlRepository
{
    public function create(string $url, string $hash): Url
    {
        return Url::create([
            'url'  => $url,
            'hash' => $hash
        ]);
    }

    public function getByHash(string $hash): ?Url
    {
        return Url::where('hash', $hash)->first();
    }

    public function getByUrl(string $url): ?Url
    {
        return Url::where('url', $url)->first();
    }
}
