<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model {
    protected $table = 'reports';
    protected $primaryKey = 'id';
    protected $fillable = [
    						'date',
    						'app',
    						'ad_unit',
    						'admob_network_requests',
    						'matched_requests',
    						'match_rate_persen',
    						'impressions',
    						'show_rate_persen',
    						'clicks',
    						'impressions_ctr_persen',
    						'admob_network_request_rpm_idr',
    						'impression_rpm_idr',
    						'estimated_earnings_idr',
    						'active_view_eligible_impressions',
    						'measurable_impressions',
    						'viewable_impressions',
    						'measurable_impressions_persen',
    						'viewable_impressions_persen'
    					];

    public function project(){
        return $this->hasMany('App\Project');
    }
}
