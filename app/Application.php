<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model{
	protected $table = 'applications';
    protected $fillable = ['app_id','name'];

    public function adUnit(){
		return $this->hasMany('App\AdUnit','fk_app');
	}
}


