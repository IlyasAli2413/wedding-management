@extends('layouts.app')
@section('title', 'Edit Client')

@section('content')
    <h2 style="margin-bottom: 20px;">Edit Client</h2>

    <form action="{{ route('admin.clients.update', $client->Client_ID) }}" method="POST" style="max-width: 600px;">
        @csrf
        @method('PUT')

        <div style="margin-bottom: 15px;">
            <label for="Name" style="display: block;">Client Name</label>
            <input type="text" name="Name" value="{{ $client->Name }}" required style="width: 100%; padding: 8px;">
        </div>

        <div style="margin-bottom: 15px;">
            <label for="Contact" style="display: block;">Contact</label>
            <input type="text" name="Contact" value="{{ $client->Contact }}" required style="width: 100%; padding: 8px;">
        </div>

        <div style="margin-bottom: 15px;">
            <label for="Address" style="display: block;">Address</label>
            <textarea name="Address" rows="3" required style="width: 100%; padding: 8px;">{{ $client->Address }}</textarea>
        </div>

        <button type="submit" style="padding: 10px 20px; background-color: #28a745; color: white; border: none; border-radius: 4px;">Update</button>
        <a href="{{ route('admin.clients.index') }}" style="padding: 10px 20px; background-color: gray; color: white; text-decoration: none; border-radius: 4px;">Cancel</a>
    </form>
@endsection
