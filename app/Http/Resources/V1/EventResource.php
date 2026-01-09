<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EventResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
          'id' => $this->id,
          'title' => $this->title,
          'star_date' => $this->star_date?->toIso8601String(),
          'end_date' => $this->end_date?->toIso8601String(),
          'is_active' => $this->is_published,
        ];
    }
}
