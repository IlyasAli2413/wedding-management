@extends('layouts.app')
@section('title', 'Add Menu Item')

@section('content')
<h2 style="margin-bottom: 20px;">Add New Menu Item</h2>

<form action="{{ route('admin.weddingmenuitems.store') }}" method="POST" style="max-width: 600px;">
    @csrf
    
    <div style="margin-bottom: 15px;">
        <label for="Name" style="display: block; margin-bottom: 5px;">Name:</label>
        <input type="text" id="Name" name="Name" required style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;">
    </div>
    
    <div style="margin-bottom: 15px;">
        <label for="Details" style="display: block; margin-bottom: 5px;">Details:</label>
        <textarea id="Details" name="Details" required style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px; height: 100px;"></textarea>
    </div>
    
    <div style="margin-bottom: 15px;">
        <label for="Price" style="display: block; margin-bottom: 5px;">Price:</label>
        <input type="number" id="Price" name="Price" step="0.01" required style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;">
    </div>
    
    <button type="submit" style="padding: 10px 20px; background-color: green; color: white; border: none; border-radius: 4px; cursor: pointer;">Add Menu Item</button>
    <a href="{{ route('admin.weddingmenuitems.index') }}" style="padding: 8px 16px; background-color: gray; color: white; text-decoration: none; margin-left: 10px;">Cancel</a>
</form>
@endsection
