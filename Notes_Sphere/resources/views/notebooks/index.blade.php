@extends('layouts.app')

@section('content')
    <h2 class="text-2xl font-semibold mb-4">All Notebooks</h2>
    <p>Select a notebook from the left or create one.</p>
@endsection

<!-- Display success message if available -->
@if (session('success'))
    <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
        {{ session('success') }}
    </div>
@endif
