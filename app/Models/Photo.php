<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    protected $fillable = [
        'book_id',
        'path',
    ];

    // Relación con el modelo Book
    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
