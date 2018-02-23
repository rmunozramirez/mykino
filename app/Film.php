<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    public function fsk()
    {
    	return $this->belongsTo('App\Fsk');
    }

    public function category()
    {
    	return $this->belongsTo('App\Category');
    }

    public function language()
    {
    	return $this->belongsTo('App\Language');
    }   
	

    public function actors() {
        return $this->belongsToMany(Actor::class);
    }
}
