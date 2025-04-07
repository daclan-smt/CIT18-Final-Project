@extends('layouts.app')

@section('content')
    <h2 class="text-xl font-semibold mb-4">New Note</h2>

    {{-- Show success message if available --}}
    @if (session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    {{-- Show validation errors --}}
    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('notes.store', $notebook) }}" method="POST" class="space-y-4">
        @csrf
        <input 
            type="text" 
            name="title" 
            placeholder="Note title" 
            class="w-full border p-2 rounded {{ $errors->has('title') ? 'border-red-500' : '' }}" 
            value="{{ old('title') }}" 
            aria-describedby="title-error"
        >
        @if ($errors->has('title'))
            <div id="title-error" class="text-red-500 text-sm">{{ $errors->first('title') }}</div>
        @endif

        <textarea 
            name="content" 
            rows="5" 
            placeholder="Note content..." 
            class="w-full border p-2 rounded {{ $errors->has('content') ? 'border-red-500' : '' }}" 
            aria-describedby="content-error"
        >{{ old('content') }}</textarea>
        @if ($errors->has('content'))
            <div id="content-error" class="text-red-500 text-sm">{{ $errors->first('content') }}</div>
        @endif

        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Save</button>
    </form>
@endsection
