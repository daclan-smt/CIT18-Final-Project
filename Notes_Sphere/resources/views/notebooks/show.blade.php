@extends('layouts.app')

@section('content')
    <h2 class="text-2xl font-semibold mb-4">{{ $notebook->title }}</h2>

    <div x-data="{ openNote: false }">
        <button @click="openNote = true" class="bg-blue-500 text-white px-3 py-2 rounded mb-4 inline-block">+ New note</button>

        <div x-show="openNote" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
            <div class="bg-white p-6 rounded shadow-lg w-1/3" @click.away="openNote = false">
                <h2 class="text-xl font-bold mb-4">New Note in {{ $notebook->title }}</h2>
                <form action="{{ route('notes.store', $notebook) }}" method="POST">
                    @csrf
                    <input type="text" name="title" placeholder="Note title" class="w-full border p-2 rounded mb-2">
                    <textarea name="content" rows="5" placeholder="Note content" class="w-full border p-2 rounded mb-4"></textarea>
                    <div class="flex justify-end gap-2">
                        <button type="button" @click="openNote = false" class="px-4 py-2 bg-gray-300 rounded">Cancel</button>
                        <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-3 gap-4">
        @forelse($notebook->notes as $note)
            <div class="bg-white p-4 rounded shadow">
                <h3 class="font-bold">{{ $note->title }}</h3>
                <p>{{ $note->content }}</p>
                <small>{{ $note->created_at->diffForHumans() }}</small>
                <div class="mt-2 flex gap-2">
                    <a href="{{ route('notes.edit', [$notebook, $note]) }}" class="text-blue-500">✏️</a>
                    <form action="{{ route('notes.destroy', [$notebook, $note]) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this note?');">
                        @csrf @method('DELETE')
                        <button type="submit" class="text-red-500">🗑️</button>
                    </form>
                </div>                
            </div>
        @empty
            <p>No notes</p>
        @endforelse
    </div>
@endsection