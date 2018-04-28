<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
	use SoftDeletes;

	protected $table='levels';

	protected $fillable=['name','abreviation'];

	public function tickets(){
		return $this->hasMany('App\Ticket');
	}
}

