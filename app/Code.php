<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Code extends Model
{
	protected $table='codes';
	
	protected $fillable=['name'];

	public function tickets(){
		return $this->hasMany('App\Ticket');
	}
}
