<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Patio extends Model
{
	use SoftDeletes;
	
	protected $table="patios";

	protected $fillable=['name','abreviation'];

	public function buses(){
		return $this->hasMany('App\Bus');
	}
}
