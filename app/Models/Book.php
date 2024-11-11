<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    /**
     * @var int|mixed|string|null
     */
    public mixed $user_id;
    protected $fillable = [
        'tituloLibro',
        'autor',
        'editorialLibro',
        'versionLibro',
        'codigoInternacional',
        'descripcionLibro',
        'photo',
        'photoC',
    ];

    // Relación con el modelo User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relación con el modelo Photo
    public function photos()
    {
        return $this->hasMany(Photo::class);
    }
}

