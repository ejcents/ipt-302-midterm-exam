@extends('layout.layout')

@section('content')
    <div class="flex justify-center mt-8">
        <div class="w-full max-w-4xl">
            <h2 class="text-2xl font-bold text-center">Sportbike Records</h2>

            <!-- Only for MANAGE RECORDS permissions -->
            @can('manage-records')
                <div class="flex justify-end mb-4">
                    <a href="{{ route('sportbikes.create') }}" 
                       class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">
                        + Add New Sportbike
                    </a>
                </div>
            @endcan

            @if($sportbikes->isEmpty())
                <p class="text-center text-gray-600">No records found.</p>
            @else
                <div class="overflow-x-auto">
                    <table class="w-full border-collapse border border-gray-300">
                        <thead class="bg-gray-200">
                            <tr>
                                <th class="border border-gray-300 px-4 py-2">Id #</th>
                                <th class="border border-gray-300 px-4 py-2">Model</th>
                                <th class="border border-gray-300 px-4 py-2">Brand</th>
                                <th class="border border-gray-300 px-4 py-2">Year</th>
                                <th class="border border-gray-300 px-4 py-2">Engine</th>
                                <th class="border border-gray-300 px-4 py-2">Color</th>

                                <!-- Only admins will see ACTIONS column -->
                                @can('manage-records')
                                    <th class="border border-gray-300 px-4 py-2">Actions</th>
                                @endcan
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($sportbikes as $index => $sportbike)
                                <tr class="hover:bg-gray-100">
                                    <td class="border border-gray-300 px-4 py-2">{{ $index + 1 }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $sportbike->model }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $sportbike->brand }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $sportbike->year }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $sportbike->engine }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $sportbike->color }}</td>

                                    <!-- Only users with MANAGE-RECORDS can edit or delete -->
                                    @can('manage-records')
                                        <td class="border border-gray-300 px-4 py-2 flex justify-center gap-2">
                                            <a href="{{ route('sportbikes.edit', $sportbike->id) }}" 
                                                class="px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600">
                                                Edit
                                            </a>
                                            <form action="{{ route('sportbikes.destroy', $sportbike->id) }}" method="POST" 
                                                onsubmit="return confirm('Are you sure you want to delete this record?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" 
                                                    class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600">
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                    @endcan
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
@endsection
