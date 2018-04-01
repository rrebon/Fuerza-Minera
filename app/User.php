<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use App\Persona;
use App\Empresa;

class User extends Authenticatable
{
    use Notifiable;
    protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function ofertaLaboral(){
    	return $this->belongsToMany('OfertaLaboral');
    }
    
    /*
     * @return todos los modelos que puedan contener un usuario. 
     */
    public function userable(){
    	return $this->morphTo();
    }
}
