<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
	use Notifiable;
	use SoftDeletes;

    protected $fillable = [
        'name', 'email', 'password','rol_id'
	];
	
	public static function navigation(){
		return auth()->check()? auth()->user()->rol->abreviation : 'guest';
	} 

    protected $hidden = [
        'password', 'remember_token',
	];
	
	public function rol(){
		return $this->belongsTo('App\Rol');
	}

	public function getIsAdminAttribute(){
		return $this->rol_id==1;
	}

	public function getIsSolAttribute(){
		return $this->rol_id==2;
	}
}
