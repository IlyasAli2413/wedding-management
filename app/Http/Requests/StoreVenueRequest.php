<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreVenueRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'Name' => 'required|string|max:100',
            'Location' => 'required|string|max:100',
            'Capacity' => 'required|integer|min:1',
        ];
    }
}
