<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content', 'notebook_id'];

    // 🔗 This defines the "many-to-one" relationship
    public function notebook()
    {
        return $this->belongsTo(Notebook::class);
    }
}
