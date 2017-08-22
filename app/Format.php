<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Format extends Model
{
    //
    use SoftDeletes;
    protected $table = 'format';

    protected $fillable = [
        'operative',
        'finance',
        'observations',
        'reply_txt',
        'reply',
        'id_week',
        'id_user',
        'id_enterprise'
    ];
    public static $rules = [
        'create'=>[
            'operative'=>'max:500',
            'finance'=>'max:500',
            'observations'=>'max:500',
            'reply_txt'=>'max:500',
            'reply'=>'boolean',
            'id_week'=>'required|integer|exists:week,id',
            'id_user'=>'required|integer|exists:users,id',
            'id_enterprise'=>'required|integer|exists:enterprise,id'
        ],
        'update'=>[
            'operative'=>'max:500',
            'finance'=>'max:500',
            'observations'=>'max:500',
            'reply_txt'=>'max:500',
            'reply'=>'boolean',
        ]
    ];

    protected $appends = ['files'];

    public function getFilesAttribute(){
        $id = $this->id;
        $files = Files::where('id_format',$id)->get();
        return $files;
    }
}
