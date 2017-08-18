<?php

namespace App;

use Hash;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token','deleted_at'
    ];
    protected $dates = ['deleted_at'];
    /**
     * Automatically creates hash for the user password.
     *
     * @param  string  $value
     * @return void
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }
    protected $appends = ['enterprises'];

    public function getEnterprisesAttribute(){
        $ids = Enterprise_User::where('id_user',$this->id)->get(['id_enterprise'])->toArray();
        $enterprises = Enterprise::whereIn('id',$ids)->get();
        $filter = $enterprises->map(function ($enterprise){
            return ['id'=>$enterprise->id,
                'name'=>$enterprise->name,
                'photo'=>$enterprise->photo,
                'color'=>$enterprise->color,
                'extend'=>$enterprise->extend,
            ];
        });
        return $filter;
    }
    public static $rules = [
        'create'=>[
            'name'=>'required|max:255',
            'email'=>'required|max:255|unique:users',
            'password'=>'required|max:10',
            'role'=>'required|integer',
        ]
    ];
}
