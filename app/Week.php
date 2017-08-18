<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Week extends Model
{
    use SoftDeletes;
    //
    protected $table = 'week';
    protected $fillable = [
        'start_date',
        'end_date'
    ];
}
