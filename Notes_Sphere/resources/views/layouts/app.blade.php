<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Notesphere</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-gray-100 text-gray-800">
<div class="min-h-screen flex" x-data="{ showNoteModal: false, selectedNotebook: null }">
    <div class="w-1/5 bg-orange-200 p-4">
        <h1 class="text-xl font-bold mb-4">
            <img src="{{ asset('images/note-logo.png') }}" alt="Notesphere Logo" class="h-8 inline-block" />
        </h1>

        <!-- + New Note Button -->
        @isset($notebook)
        <button @click="showNoteModal = true" class="bg-orange-300 px-3 py-2 rounded-lg mb-4 w-1/2 transition-colors duration-200 hover:bg-orange-400">+ New Note</button>
        @endisset

        <div class="flex items-center justify-between mb-2">
            <h2 class="font-semibold">📙NOTEBOOKS</h2>
            <a href="{{ route('notebooks.create') }}" class="text-xl text-orange-500 ">+</a>
        </div>

        @foreach($notebooks as $notebook)
            <div class="flex items-center mb-1">
                <div class="flex items-center flex-1 bg-orange-300 rounded-full p-2 transition-colors duration-200 hover:bg-orange-400" 
                     :class="selectedNotebook === '{{ $notebook->id }}' ? 'bg-orange-400' : ''">
                    <a href="{{ route('notebooks.show', $notebook) }}" @click="selectedNotebook = '{{ $notebook->id }}'" class="flex-1">
                        <span>{{ $notebook->title }}</span>
                    </a>
                    <a href="{{ route('notebooks.edit', $notebook) }}" class="bg-orange-300 p-1 flex items-center justify-center rounded-lg transition-colors duration-200 hover:bg-orange-200 ml-2">
                        <span class="text-sm">✏️</span>
                    </a>
                    <form action="{{ route('notebooks.destroy', $notebook) }}" method="POST" class="inline">
                        @csrf @method('DELETE')
                        <button type="submit" class="bg-orange-300 p-1 flex items-center justify-center rounded-lg transition-colors duration-200 hover:bg-orange-200 ml-2">
                            <span class="text-sm">🗑️</span>
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Main content area with background image -->
    <div class="w-3/4 p-6 flex-1" style="
    background-image: url('{{ asset('images/notes-bg.png') }}');
    background-size: cover; 
    background-position: center; 
    background-repeat: no-repeat;">
    @yield('content')
    </div>

    <!-- Modal for Creating Notes -->
    @isset($notebook)
    <div x-show="showNoteModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
        <div @click.away="showNoteModal = false" class="bg-white rounded-lg p-6 w-1/2">
            <h2 class="text-lg font-semibold mb-4">Create New Note</h2>
            <form method="POST" action="{{ route('notebooks.notes.store', $notebook) }}">
                @csrf
                <input type="text" name="title" placeholder="Note Title" class="w-full p-2 border rounded mb-3" required>
                <textarea name="content" placeholder="Write something..." class="w-full p-2 border rounded mb-3" rows="5" required></textarea>
                <div class="flex justify-end gap-2">
                    <button type="button" @click="showNoteModal = false" class="px-4 py-2 bg-gray-300 rounded transition-colors duration-200 hover:bg-gray-400">Cancel</button>
                    <button type="submit" class="px-4 py-2 bg-orange-400 text-white rounded transition-colors duration-200 hover:bg-orange-500">Done</button>
                </div>
            </form>
        </div>
    </div>
    @endisset
</div>
</body>
</html>