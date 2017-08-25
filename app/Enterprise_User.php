<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Enterprise_User extends Model
{
    use SoftDeletes;
    //Tabla
    protected $table = 'enterprise_user';

    //Campos
    protected $fillable = ['id_user','id_enterprise'];

    public static $rules = [
        // Validation rules
        'create'=>[
            'id_user'=>'required|integer',
            'id_enterprise'=>'required|integer',
        ]
    ];

}
