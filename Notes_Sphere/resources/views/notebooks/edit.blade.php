@extends('layouts.app')

@section('content')
    <h2 class="text-2xl font-semibold mb-4">Edit Notebook</h2>

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

    <form action="{{ route('notebooks.update', $notebook) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')
        <input
            type="text"
            name="title"
            value="{{ old('title', $notebook->title) }}"  {{-- Retains old value or the notebook's title --}}
            class="w-full p-2 border border-gray-300 rounded"
        >
        <button
            type="submit"
            class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600"
        >
            Update
        </button>
    </form>
@endsection
