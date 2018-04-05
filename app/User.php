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
    
    public function roles(){
    	return $this->belongsToMany(Role::class);
    }
    
    public function  authorizedRoles($roles){
    	if(is_array($roles)){
    		return $this->hasAnyRole($roles) || abort(401, "No esta autorizado para esta acción.");
    	}
    	return $this->hasAnyRole($roles) || abort(401, "No esta autorizado para esta acción.");
    }
    
    public function hasAnyRole($roles){
    	return null !== $this->roles()->whereIn('nombre',$roles)->first();
    }
    
    public function hasRole($role){
    	return null !== $this->roles()->where('nombre',$role)->first();
    }
}
