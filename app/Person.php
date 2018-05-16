<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
	protected $table="people";
	
	protected $fillable=['name','firsName','LastName','identity_card','issued'];

	public function getFullNameAttribute()
	{
	  return $this->attributes['firstName'].' '.
			 $this->attributes['lastName'].' '.
			 $this->attributes['name'];
	}  

	public function setFirstNameAttribute($value){
        $this->attributes['firstName'] = ucfirst($value);
	}

	public function setLastNameAttribute($value){
        $this->attributes['lastName'] = ucfirst($value);
	}

	public function setNameAttribute($value){
        $this->attributes['name'] = ucfirst($value);
	}
}
