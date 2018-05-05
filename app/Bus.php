<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
	use SoftDeletes;
	
	protected $table="buses";

	protected $fillable=['code','license_plate','patio_id'];

	public function patio(){
		return $this->belongsTo('App\Patio','patio_id')->withTrashed();
	}

	public function tickets(){
		return $this->hasMany('App\Ticket');
	}
}
