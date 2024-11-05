<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PersonalData extends Model
{
    //
    protected $table = 'personals';

    protected $fillable = [
        'name',
        'phone',
        'email',
    ];
}
