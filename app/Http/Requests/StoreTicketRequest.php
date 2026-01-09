<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreTicketRequest extends FormRequest
{
    
    public function authorize(): bool
    {
        return true;
    }

   
    public function rules(): array
    {
        return [
            'showtime_id' => 'required|exists:showtimes,id',
            'seat_number' => [
              'required',
              'string',
              Rule::unique('tickets')->where(function ($query){
                return $query->where('showtime_id', $this->showtime_id);
              }),
            ],
        ];
    }

    public function messages()
    {
      return [
        'seat_number.unique' => 'Este asiento ya está ocupado para esta función.',
      ];
    }
}
