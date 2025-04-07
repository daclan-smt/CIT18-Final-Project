<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Notebook extends Model
{
    use HasFactory;

    // ✅ This tells Laravel which fields are allowed for mass assignment
    protected $fillable = ['title'];

    // 🧠 This defines the "one-to-many" relationship
    public function notes()
    {
        return $this->hasMany(Note::class);
    }
}