@extends('layouts.app')

@section('content')
    <h2 class="text-xl font-semibold mb-4">Edit Note</h2>

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

    <form action="{{ route('notes.update', [$notebook, $note]) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')
        
        <input 
            type="text" 
            name="title" 
            value="{{ old('title', $note->title) }}" 
            class="w-full border p-2 rounded {{ $errors->has('title') ? 'border-red-500' : '' }}"
        >
        
        <textarea 
            name="content" 
            rows="5" 
            class="w-full border p-2 rounded {{ $errors->has('content') ? 'border-red-500' : '' }}"
        >{{ old('content', $note->content) }}</textarea>
        
        <button type="submit" class="bg
