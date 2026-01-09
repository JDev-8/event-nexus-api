<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MovieResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
          'id' => $this->id,
          'titulo_oficial' => $this->title, 
          'resumen' => $this->synopsis,
          'duracion' => $this->duration_minutes . ' minutos',
          'portada' => $this->poster_url,
        ];
    }
}
