@extends('layouts.app')

@section('content')
    <h2 class="text-2xl font-semibold mb-4">Create a New Note in "{{ $notebook->title }}"</h2>

    <form method="POST" action="{{ route('notebooks.notes.store', $notebook) }}">
        @csrf

        <label for="title" class="block mb-2">Title</label>
        <input type="text" name="title" class="w-full p-2 border border-orange-400 rounded" required>

        <label for="content" class="block mb-2">Content</label>
        <textarea name="content" class="w-full p-2 border border-orange-400 rounded" required></textarea>

        <button type="submit" class="bg-orange-400 text-white px-4 py-2 rounded hover:bg-orange-500 mt-4">Save Note</button>
    </form>
@endsection