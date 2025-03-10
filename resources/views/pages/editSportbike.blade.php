@extends('layout.layout')

@section('content')
<div class="max-w-lg mx-auto mt-8">
    <h2 class="text-2xl font-bold mb-4 text-center">Edit Sportbike</h2>
    <form action="{{ route('sportbikes.update', $sportbike->id) }}" method="POST">
        @csrf
        @method('PUT') <!-- METHOD for updating -->
        
        <input type="text" name="model" value="{{ $sportbike->model }}" required class="w-full border p-2 mb-2">
        <input type="text" name="brand" value="{{ $sportbike->brand }}" required class="w-full border p-2 mb-2">
        <input type="number" name="year" value="{{ $sportbike->year }}" required class="w-full border p-2 mb-2">
        <input type="text" name="engine" value="{{ $sportbike->engine }}" required class="w-full border p-2 mb-2">
        <input type="text" name="color" value="{{ $sportbike->color }}" required class="w-full border p-2 mb-2">
        
        <button type="submit" class="w-full bg-blue-500 text-white p-2">Update Sportbike</button>
    </form>
</div>
@endsection
