<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model{
	protected $table = 'items';	
    protected $fillable = ['date','app','ad unit','admob network requests','matched requests','match rate persen','impressions','show rate persen','clicks','impressions ctr persen','admob network request rpm idr','impression rpm idr','estimated earnings idr','active view eligible impressions','measurable impressions''viewable impressions','measurable impressions persen','viewable impressions persen'];
}
