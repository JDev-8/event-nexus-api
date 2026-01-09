<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected function casts(): array{
      return [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
        'is_published' => 'boolean',
      ];
    }

    public function ticketTypes(){
      return $this->hasMany(TicketType::class);
    }
}
