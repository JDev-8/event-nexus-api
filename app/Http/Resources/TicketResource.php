<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TicketResource extends JsonResource
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
          'asiento' => $this->seat_number,
          'precio_pagado' => $this->price_paid,
          'pelicula' => $this->showtime->movie->title,
          'fecha_funcion' => $this->showtime->starts_at,
          'sala' => $this->showtime->room,
          'fecha_compra' => $this->created_at->toDateTimeString(),
        ];
    }
}
