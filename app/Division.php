<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
	protected $fillable = [
		'name', 'sport_id'

	];

    public function sport()
    {

    	return $this->belongsTo(Sport::class);
    }
}
