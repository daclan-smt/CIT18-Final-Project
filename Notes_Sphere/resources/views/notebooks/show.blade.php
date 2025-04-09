@extends('layouts.app')

@section('content')
    <h2 class="text-2xl font-semibold mb-4">{{ $notebook->title }} - Notes</h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
        @forelse($notebook->notes as $note)
            <div class="bg-white rounded-lg shadow-md p-4 transition-transform transform hover:scale-105  hover:bg-orange-200">
                <h3 class="font-semibold text-lg">{{ $note->title }}</h3>
                <p class="text-sm text-gray-600">{{ Str::limit($note->content, 100) }}</p>
                <div class="mt-2 flex justify-end items-center gap-0">
                    <div class="emoji-container hover:bg-orange-300 rounded p-1">
                        <a href="{{ route('notebooks.notes.edit', [$notebook, $note]) }}" class="text-orange-400 flex items-center text-sm">✏️
                        </a>
                    </div>
                    <div class="emoji-container hover:bg-orange-300 rounded p-1">
                        <form action="{{ route('notebooks.notes.destroy', [$notebook, $note]) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-orange-400 flex items-center text-sm">🗑️
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-gray-500">No notes yet.</p>
        @endforelse
    </div>
@endsection