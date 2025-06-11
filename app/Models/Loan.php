<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    protected $guarded = [
        'id',
        'created_at',
        'updated_at'
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function books()
    {
        return $this->belongsToMany(Book::class, 'book_loan', 'loan_id', 'book_id');
    }
}
