@extends('layouts.app')

@section('content')
    <h2 class="text-2xl font-semibold mb-4">Create a New Notebook</h2>

    <form method="POST" action="{{ route('notebooks.store') }}">
        @csrf

        <label for="title" class="block mb-2">Title</label>
        <input type="text" name="title" class="w-1/2 p-2 border border-orange-400 rounded" required>

        <button type="submit" class="bg-orange-400 text-white px-4 py-2 rounded hover:bg-orange-500 mt-4">Create Notebook</button>
    </form>
@endsection