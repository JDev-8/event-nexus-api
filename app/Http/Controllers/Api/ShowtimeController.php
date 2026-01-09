<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreShowtimeRequest;
use App\Models\Showtime;

class ShowtimeController extends Controller
{
    public function index(){
      return Showtime::with('movie')->get();
    }
  
    public function store(StoreShowtimeRequest $request){
      $showtime = Showtime::create($request->validated());
      
      return response()->json([
        'message' => 'Función creada exitosamente',
        'data' => $showtime
      ]);
    }
}
