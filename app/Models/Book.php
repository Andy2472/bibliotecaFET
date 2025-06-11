<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;


class Book extends Model
{
    protected $guarded = [
        'id',
        'created_at',
        'updated_at'
    ];

    public function authors()
    {
        return $this->belongsToMany(Author::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function editorials()
    {
        return $this->belongsToMany(Editorial::class);
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function loans()
    {
        return $this->belongsToMany(Loan::class);
    }

    /* Muchachos, este metodo, se usa para que cuando se elimine el registro de un libro, se elimine tambien la imagen de la portada relacionada a ese registro
    y así, no se vaya acumulando muchas imagenes basura dentro del servidor */

    protected static function booted()
    {
        static::deleting(function ($book) {
            if ($book->cover_image && Storage::disk('public')->exists($book->cover_image)) {
                Storage::disk('public')->delete($book->cover_image);
            }
        });
    }
}
