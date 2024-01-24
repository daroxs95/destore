<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GameResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'slug' => $this->slug,
            'title' => $this->title,
            'description' => $this->description,
            'tags' => $this->tags->pluck('name'),
            'store_url' => route('games.show', $this),
            'release_date' => $this->release_date,
            'creator' => new UserResource($this->creator),
            'download_url' => $this->download_url,
        ];
    }
}
