<?php

namespace App\Http\Controllers;

use App\Http\Requests\UrlStoreRequest;
use App\Http\Resources\UrlResource;
use App\Services\Url\Actions\RedirectAction;
use App\Services\Url\Actions\GetShortUrlAction;
use Illuminate\Http\RedirectResponse;

class UrlController extends Controller
{
    public function __construct(
        private readonly RedirectAction $redirectAction,
        private readonly GetShortUrlAction $getShortUrlAction,
    ) {
    }

    public function store(UrlStoreRequest $request): UrlResource
    {
        $urlModel = $this->getShortUrlAction->run($request->url);

        return new UrlResource($urlModel);
    }

    public function redirect(string $hash): RedirectResponse
    {
        return $this->redirectAction->run($hash);
    }

}
