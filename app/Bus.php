<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
	use SoftDeletes;
	
	protected $table="buses";

	protected $fillable=['name','abreviation'];

	public function patio(){
		return $this->belongsTo('App\Patio');
	}
}
