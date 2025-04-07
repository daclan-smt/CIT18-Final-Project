<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Notesphere</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">
    <div class="min-h-screen flex">
        <div class="w-1/4 bg-orange-100 p-4">
            <h1 class="text-xl font-bold mb-4">📝 notesphere</h1>
            <a href="{{ route('notebooks.create') }}" class="bg-orange-300 text-white px-3 py-2 rounded mb-2 inline-block">+ New notebook</a>

            <h2 class="mt-4 mb-2 font-semibold">NOTEBOOKS</h2>
            @foreach($notebooks as $notebook)
                <div class="flex justify-between items-center bg-orange-200 rounded p-2 mb-1">
                    <a href="{{ route('notebooks.show', $notebook) }}">{{ $notebook->title }}</a>
                    <div class="flex gap-1">
                        <a href="{{ route('notebooks.edit', $notebook) }}">✏️</a>
                        <form action="{{ route('notebooks.destroy', $notebook) }}" method="POST">
                            @csrf @method('DELETE')
                            <button type="submit">🗑️</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="w-3/4 p-6">
            @yield('content')
        </div>
    </div>
</body>
</html>
