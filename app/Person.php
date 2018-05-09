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
}
