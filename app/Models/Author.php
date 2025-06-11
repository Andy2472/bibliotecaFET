<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{

    protected $guarded = [
        'id',
        'created_at',
        'updated_at'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function books(){
        return $this->belongsToMany(Book::class);
    }
}
