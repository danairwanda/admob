<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdUnit extends Model{
    protected $table 	= 'ad_units';
    protected $fillable = ['adUnit_id','name','fk_app'];
    
    public function application(){
		return $this->belongsTo('App\Application');
	}
}

