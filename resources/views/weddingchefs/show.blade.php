@extends('layouts.app')
@section('title', 'Chef Details')

@section('content')
<h2 style="margin-bottom: 20px;">Chef Details</h2>

<ul style="list-style: none; padding: 0; font-size: 16px; max-width: 500px;">
    <li style="padding: 10px; border: 1px solid #ccc; margin-bottom: 5px; background-color: #f9f9f9;">
        <strong>Name:</strong> {{ $chef->staffMember->Name ?? 'N/A' }}
    </li>
    <li style="padding: 10px; border: 1px solid #ccc; margin-bottom: 5px; background-color: #f9f9f9;">
        <strong>Speciality:</strong> {{ $chef->Speciality }}
    </li>
</ul>

<a href="{{ route('weddingchefs.index') }}" 
   style="padding: 8px 15px; background-color: #6c757d; color: white; text-decoration: none; border-radius: 5px;">
   Back
</a>
@endsection
