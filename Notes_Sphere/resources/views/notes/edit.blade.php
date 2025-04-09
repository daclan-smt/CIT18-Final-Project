@extends('layouts.app')

@section('content')
    <h2 class="text-2xl font-semibold mb-4">Edit Note</h2>

    <form method="POST" action="{{ route('notebooks.notes.update', [$notebook, $note]) }}">
        @csrf
        @method('PUT')

        <label for="title" class="block mb-3">Title</label>
        <input 
            type="text" 
            name="title" 
            value="{{ old('title', $note->title) }}" 
            class="w-10/12 border border-orange-400 rounded p-2 {{ $errors->has('title') ? 'border-red-500' : '' }}"
            required
        >

        <label for="content" class="block mb-3 mt-5">Content</label>
        <textarea 
            name="content" 
            rows="5" 
            class="w-10/12 border border-orange-400 rounded p-2 {{ $errors->has('content') ? 'border-red-500' : '' }}"
            required
        >{{ old('content', $note->content) }}</textarea>

        <!-- Save button positioned below the input box on the left -->
        <div class="mt-4">
            <button type="submit" class="bg-orange-400 text-white px-4 py-2 rounded hover:bg-orange-500">Save</button>
        </div>
    </form>
@endsection