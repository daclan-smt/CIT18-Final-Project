<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\Notebook;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function create(Notebook $notebook)
    {
        return view('notes.create', compact('notebook'));
    }

    public function store(Request $request, Notebook $notebook)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);
        $note = $notebook->notes()->create($validated);
        return redirect()->route('notebooks.show', $notebook)->with('success', 'Note created successfully.');
    }

    public function edit(Notebook $notebook, Note $note)
    {
        return view('notes.edit', compact('notebook', 'note'));
    }

    public function update(Request $request, Notebook $notebook, Note $note)
    {
        $request->validate(['title' => 'required', 'content' => 'required']);
        $note->update($request->only('title', 'content'));
        return redirect()->route('notebooks.show', $notebook)->with('success', 'Note updated successfully.');
    }

    public function destroy(Notebook $notebook, Note $note)
    {
        $note->delete();
        return redirect()->route('notebooks.show', $notebook)->with('success', 'Note deleted successfully.');
    }
}