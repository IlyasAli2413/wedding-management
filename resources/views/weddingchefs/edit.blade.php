@extends('layouts.app')
@section('title', 'Edit Chef')

@section('content')
<h2 style="margin-bottom: 20px;">Edit Chef</h2>

<form action="{{ route('weddingchefs.update', $chef->Staffmember_ID) }}" method="POST" style="max-width: 600px; background: #f9f9f9; padding: 20px; border-radius: 10px; border: 1px solid #ccc;">
    @csrf
    @method('PUT')

    <div style="margin-bottom: 15px;">
        <label style="display: block; margin-bottom: 5px; font-weight: bold;">Speciality</label>
        <input type="text" name="Speciality" class="form-control"
               value="{{ $chef->Speciality }}"
               required
               style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
    </div>

    <button type="submit"
            style="padding: 10px 20px; background-color: #007bff; color: white; border: none; border-radius: 5px; margin-right: 10px;">
        Update
    </button>

    <a href="{{ route('weddingchefs.index') }}"
       style="padding: 10px 20px; background-color: gray; color: white; text-decoration: none; border-radius: 5px;">
        Cancel
    </a>
</form>
@endsection
