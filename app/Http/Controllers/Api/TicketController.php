<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Showtime;
use App\Models\Ticket;
use App\Http\Requests\StoreTicketRequest;
use App\Http\Resources\TicketResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();

        $tickets = $user->tickets()->with('showtime.movie')->latest()->get();

        return TicketResource::collection($tickets);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTicketRequest $request)
    {
        return DB::transaction(function () use ($request){
          $showtime = Showtime::findOrFail($request->showtime_id);

          $ticket = Ticket::create([
            'user_id' => Auth::id(),
            'showtime_id' => $showtime->id,
            'price_paid' => $showtime->ticket_price,
            'seat_number' => $request->seat_number,
          ]);

          return response()->json([
            'message' => 'Ticket comprado con éxito',
            'data' => $ticket
          ], 201);
        });
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
