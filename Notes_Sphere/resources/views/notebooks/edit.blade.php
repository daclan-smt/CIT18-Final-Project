@extends('layouts.app')

@section('content')
    <h2 class="text-2xl font-semibold mb-4">Edit Notebook</h2>

    <form method="POST" action="{{ route('notebooks.update', $notebook) }}">
        @csrf
        @method('PUT')

        <label for="title" class="block mb-2">Title</label>
        <input type="text" name="title" value="{{ old('title', $notebook->title) }}" class="w-full p-2 border rounded" required>

        <button type="submit" class="bg-orange-400 text-white px-4 py-2 rounded hover:bg-orange-500 mt-4">Update Notebook</button>
    </form>
@endsection