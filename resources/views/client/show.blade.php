@extends('layouts.app')
@section('title', 'Client Details')

@section('content')
    <h2 style="margin-bottom: 20px;">Client Details</h2>

    <div style="border: 1px solid #ccc; padding: 20px; max-width: 600px;">
        <p><strong>ID:</strong> {{ $client->Client_ID }}</p>
        <p><strong>Name:</strong> {{ $client->Name }}</p>
        <p><strong>Contact:</strong> {{ $client->Contact }}</p>
        <p><strong>Address:</strong> {{ $client->Address }}</p>
    </div>

    <div style="margin-top: 20px;">
        <a href="{{ route('admin.clients.index') }}" style="padding: 10px 20px; background-color: #007bff; color: white; text-decoration: none; border-radius: 4px;">Back to List</a>
        <a href="{{ route('admin.clients.edit', $client->Client_ID) }}" style="padding: 10px 20px; background-color: #ffc107; color: black; text-decoration: none; border-radius: 4px;">Edit</a>
    </div>
@endsection
