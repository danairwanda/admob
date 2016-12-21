<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model{
	protected $table 	=	'projects';
	protected $fillable =	['fk_user','fk_app','name_apps','fk_adunit','name_adunit','share'];
    
	public function adunit(){
    	return $this->belongsTo('App\AdUnit','fk_adunit');
    }
    
    public function user(){
    	return $this->belongsTo('App\User','fk_user');
    }

    public function application(){
    	return $this->belongsTo('App\Application','fk_app');
    }

    public function report(){
        return $this->belongsTo('App\Report');
    }
}
