<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    public function loan(){
        return $this->hasMany(Loan::class);
    }
}
