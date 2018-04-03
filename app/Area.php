<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
	use SoftDeletes;

	protected $table = "areas";

	protected $fillable=['name','abreviation'];

	public function tickets(){
		return $this->hasMany('App\Ticket');
	}
	
}
