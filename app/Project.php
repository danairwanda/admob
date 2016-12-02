<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model{
	protected $table 	=	'projects';
	protected $fillable =	['fk_adunit','fk_user','share'];
    
	public function adunit(){
    	return $this->belongsTo('App\AdUnit','fk_adunit');
    }
    
    public function user(){
    	return $this->belongsTo('App\User','fk_user');
    }

    public function project(){
    	return $this->belongsTo('App\Application','fk_app');
    }
}
