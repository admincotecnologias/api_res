<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Files extends Model
{
    use SoftDeletes;
    //
    protected $fillable = [
        'id_format',
        'name',
        'path',
        'extension',
        'mime',
        'type'
    ];
    public static $rules = [
        'create' => [
            'id_format' => 'required|integer|exist:format,id',
            'name' => 'required|max:100',
            'path' => 'required|max:100',
            'extension' => 'required|max:100',
            'mime' => 'required|max:100',
            'type' => 'required|integer'
        ],
        'update' => [
            'name' => 'max:100',
            'path' => 'max:100',
            'extension' => 'max:100',
            'mime' => 'max:100',
            'type' => 'integer'
        ]
    ];
}
