<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotebookController;
use App\Http\Controllers\NoteController;

Route::get('/', function () {
    return redirect()->route('notebooks.index');
});

Route::resource('notebooks', NotebookController::class);
Route::resource('notebooks.notes', NoteController::class);
