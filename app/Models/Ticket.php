<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
      'user_id',
      'showtime_id',
      'price_paid',
      'seat_number'
    ];

    public function user(){
      return $this->belongsTo(User::class);
    }

    public function showtime(){
      return $this->belongsTo(Showtime::class);
    }
}
