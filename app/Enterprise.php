<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Tymon\JWTAuth\Facades\JWTAuth;

class Enterprise extends Model
{
    use SoftDeletes;
    //Tabla
    protected $table = 'enterprise';

    //Campos
    protected $fillable = ['id','name','photo','color','extend'];

    public static $rules = [
        // Validation rules
        'create'=>[
            'name'=>'required|max:50',
            'color'=>'required|nullable|max:9',
            'extend'=>'required|nullable|exists:enterprise,id',
            'id'=>'nullable|integer',
            'type'=>'integer',
            'photo'=>'nullable|min:1|max:100'
        ],
        'update'=>[
            'name'=>'max:50',
            'color'=>'nullable|max:9',
            'extend'=>'nullable|exist:enterprise,id'
        ]
    ];

    // Appends

    protected $appends = ['users','children'];

    public function getUsersAttribute(){
        $id = $this->id;
        $ids = Enterprise_User::where('id_enterprise',$id)->get()->pluck('id_user')->all();
        $data = User::find($ids);
        $users = $data->map(function ($user){
            return ['id'=>$user->id,'name'=>$user->name,'email'=>$user->email];
        });
        return $users;
    }
    public function getChildrenAttribute(){
        try{
            $id = $this->id;
            $data = Enterprise::where('extend',$id)->get();
            $childs = $data->map(function ($enterprise){
                return [
                    'id'=>$enterprise->id,
                    'name'=>$enterprise->name,
                    'color'=>$enterprise->color,
                    'photo'=>$enterprise->photo,
                    'users'=>$enterprise->users
                ];
            });
            return $childs;
        }catch(\Exception $e){
            return [];
        }
    }
}
