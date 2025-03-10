@extends('layout.layout')

@section('content')
<div class="max-w-lg mx-auto mt-8">
    <h2 class="text-2xl font-bold mb-4 text-center">Add Sportbike</h2>
    <form action="{{ route('sportbikes.store') }}" method="POST">
        @csrf
        <input type="text" name="model" placeholder="Model" required class="w-full border p-2 mb-2">
        <input type="text" name="brand" placeholder="Brand" required class="w-full border p-2 mb-2">
        <input type="number" name="year" placeholder="Year" required class="w-full border p-2 mb-2">
        <input type="text" name="engine" placeholder="Engine" required class="w-full border p-2 mb-2">
        <input type="text" name="color" placeholder="Color" required class="w-full border p-2 mb-2">
        <button type="submit" class="w-full bg-blue-500 text-white p-2">Add Sportbike</button>
    </form>
</div>
@endsection
