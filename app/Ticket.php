<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Ticket extends Model
{
	protected $table="tickets";

	protected $fillable=['code_area','applicant_id','operational_id','applicant_obs','operational_obs','file','code_id','bus_id','level_id','area_id'];

	protected $dates=['incident_date','start_time'];
	
	public function bus(){
		return $this->belongsTo('App\Bus');
	}
	
	public function level(){
		return $this->belongsTo('App\Level');
	}
	
	public function code(){
		return $this->belongsTo('App\Code');
	}
	
}
