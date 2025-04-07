<?php

namespace App\Http\Controllers;

use App\Models\Notebook;
use Illuminate\Http\Request;

class NotebookController extends Controller
{
    public function index()
    {
        $notebooks = Notebook::all();
        return view('notebooks.index', compact('notebooks'));
    }

    public function create()
    {
        $notebooks = Notebook::all(); // or maybe just the user's notebooks
        return view('notebooks.create', compact('notebooks'));
    }

    public function store(Request $request)
    {
        $request->validate(['title' => 'required']);
        Notebook::create($request->only('title'));

        return redirect()->route('notebooks.index')->with('success', 'Notebook created successfully!');
    }

    public function show(Notebook $notebook)
    {
        $notebooks = Notebook::all(); // for sidebar
        $notebook->load('notes');

        return view('notebooks.show', compact('notebook', 'notebooks'));
    }

    public function edit(Notebook $notebook)
    {
        $notebooks = Notebook::all(); 
        return view('notebooks.edit', compact('notebook', 'notebooks'));
    }

    public function update(Request $request, Notebook $notebook)
    {
        $request->validate(['title' => 'required']);
        $notebook->update($request->only('title'));

        return redirect()->route('notebooks.index');
    }

    public function destroy(Notebook $notebook)
    {
        $notebook->delete();
        return redirect()->route('notebooks.index');
    }
}