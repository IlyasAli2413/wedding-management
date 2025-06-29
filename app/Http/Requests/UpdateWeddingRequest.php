<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateWeddingRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'Event_Type' => 'required|string|max:100',
            'Date' => 'required|date',
            'Client_Contact' => 'required|string|max:100',
            'Venue_ID' => 'required|exists:venue,Venue_ID',
        ];
    }
}
