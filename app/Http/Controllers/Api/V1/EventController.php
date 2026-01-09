<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\EventResource;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(){
      $events = Event::where('is_published', true)->latest()->paginate(10);
      return EventResource::collection($events);
    }
}
