<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
	protected $table = "areas";

	protected $fillable=['name','abreviation'];

	public function tickets(){
		return $this->hasMany('App\Ticket');
	}
	
}
