<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PersonalData extends Model
{
    //
    protected $table = 'personals_dynamic';

    protected $fillable = [
        'coordinate_id',
        'value',
    ];
}
