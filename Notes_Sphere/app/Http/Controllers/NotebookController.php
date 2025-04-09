<?php

namespace App\Http\Controllers;

use App\Models\Notebook;
use Illuminate\Http\Request;

class NotebookController extends Controller
{
    public function index()
    {
        // Display all notebooks
        $notebooks = Notebook::all();
        return view('notebooks.index', compact('notebooks'));
    }

    public function create()
    {
        return view('notebooks.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        Notebook::create([
            'title' => $request->title,
        ]);

        return redirect()->route('notebooks.index')->with('success', 'Notebook created successfully.');
    }

    public function show(Notebook $notebook)
    {
        // Show notes within a notebook
        $notes = $notebook->notes;
        return view('notebooks.show', compact('notebook', 'notes'));
    }

    public function edit(Notebook $notebook)
    {
        return view('notebooks.edit', compact('notebook'));
    }

    public function update(Request $request, Notebook $notebook)
    {
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        $notebook->update([
            'title' => $request->title,
        ]);

        return redirect()->route('notebooks.index')->with('success', 'Notebook updated successfully.');
    }

    public function destroy(Notebook $notebook)
    {
        $notebook->delete();
        return redirect()->route('notebooks.index')->with('success', 'Notebook deleted successfully.');
    }
}