@extends('layouts.app')
@section('title', 'Menu Item Details')

@section('content')
<h2 style="margin-bottom: 20px;">Menu Item Details</h2>

<div style="background-color: #f8f9fa; padding: 20px; border-radius: 8px; margin-bottom: 20px;">
    <div style="margin-bottom: 10px;">
        <strong>ID:</strong> {{ $menuItem->MenuItem_ID }}
    </div>
    <div style="margin-bottom: 10px;">
        <strong>Name:</strong> {{ $menuItem->Name }}
    </div>
    <div style="margin-bottom: 10px;">
        <strong>Details:</strong> {{ $menuItem->Details }}
    </div>
    <div style="margin-bottom: 10px;">
        <strong>Price:</strong> Rs. {{ $menuItem->Price }}
    </div>
</div>

<div style="margin-top: 20px;">
    @if(Auth::user()->isAdmin())
        <a href="{{ route('admin.weddingmenuitems.index') }}" style="padding: 8px 16px; background-color: gray; color: white; text-decoration: none;">Back</a>
    @else
        <a href="{{ route('user.menu-items.index') }}" style="padding: 8px 16px; background-color: gray; color: white; text-decoration: none;">Back</a>
    @endif
</div>
@endsection
