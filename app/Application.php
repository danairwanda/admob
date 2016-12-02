<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model{
	protected $table = 'applications';
    protected $fillable = ['app_id','name'];

    public function adunit(){
		return $this->hasMany('App\AdUnit');
	}

	public function project(){
		return $this->hasMany('App\project');
	}
}


