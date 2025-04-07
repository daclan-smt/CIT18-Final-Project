@extends('layouts.app')

@section('content')
    <h2 class="text-2xl font-semibold mb-4">Create New Notebook</h2>

    {{-- ✅ Show validation errors here --}}
    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('notebooks.store') }}" method="POST" class="space-y-4">
        @csrf
        <input
            type="text"
            name="title"
            placeholder="Notebook Title"
            class="w-full p-2 border border-gray-300 rounded"
            
        >
        <button
            type="submit"
            class="bg-orange-500 text-white px-4 py-2 rounded hover:bg-orange-600"
        >
            Create
        </button>
    </form>
@endsection
