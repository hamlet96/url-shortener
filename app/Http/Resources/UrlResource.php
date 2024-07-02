<?php

namespace App\Http\Resources;

use App\Models\Url;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UrlResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        /** @var Url $this */
        return [
            'url'           => $this->url,
            'shortened_url' => route('url.redirect', ['hash' => $this->hash]),
            'created_at'    => $this->created_at,
        ];
    }
}
