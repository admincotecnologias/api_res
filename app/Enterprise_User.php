<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Enterprise_User extends Model
{
    //Tabla
    protected $table = 'enterprise_user';

    //Campos
    protected $fillable = ['id_user','id_enterprise'];

    public static $rules = [
        // Validation rules
        'create'=>[
            'id_user'=>'required|integer|exists:users,id',
            'id_enterprise'=>'required|integer|exists:enterprise,id',
        ]
    ];

}
