<?php

namespace App\Services\Url\Actions;

use App\Services\Url\Classes\UrlRepository;
use Illuminate\Http\RedirectResponse;

readonly class RedirectAction
{
    public function __construct(
        private UrlRepository $urlRepository,
    ) {
    }


    public function run($hash): RedirectResponse
    {
        $url = $this->urlRepository->getByHash($hash);

        abort_if($url === null, 404);

        return redirect($url->url, 301);
    }
}
