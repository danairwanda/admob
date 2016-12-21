<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Report;
use Excel;
use DB;
use App\Http\Requests;
use Auth;
use App\Project;

class ReportController extends Controller{
    public function index(Request $request){
        if (Auth::user()->isadmin == 1) {
            //  Report untuk admin
            $reports = Report::all();
            // dd($reports);
            return view('admin.report.report',compact('reports'))->with('i', ($request->input('page', 1) - 1) * 5);
        }else{
            // Report untuk users
            // $reportUser = Project::orderBy('id','ASC')
            // ->with(['application','adunit','report'])
            // ->where('projects.fk_user',Auth::user()->id)
            // ->get();
            // dd($reportUser->toArray());
            $reportUser = DB::table('reports')
                ->select('date','app','ad_unit','estimated_earnings_idr','projects.share')
                ->join('projects',function($join){
                    $join->on('projects.name_apps','=','reports.app')
                    ->on('projects.name_adunit','=','reports.ad_unit');
                })
                ->where('projects.fk_user','=', Auth::user()->id)
                ->get();
            
            // dd($reportUser);
            
            return view('users.report.report',compact('reportUser'))->with('i', ($request->input('page', 1) - 1) * 5);
        }           
    }

    public function user(Request $request){
        $reports = Report::all();
        return view('users.menu.report',compact('reports'))->with('i', ($request->input('page', 1) - 1) * 5);
    }
    
    public function importExcel(Request $request){
        if ($request->hasFile('import_file')) {
            $path = $request->file('import_file')->getRealPath();
            $data = Excel::load($path, function($reader) {})->get();
            $dataArray = $data->toArray();
            // dd($dataArray);
            $i=0;
            for($i=0;$i<=count($dataArray)-1;$i++){
                if($dataArray[$i]['date']!=null){
                   $dateExplode = explode("-",$dataArray[$i]['date']->toDateString());
                    $dateFix = $dateExplode[0]."-".$dateExplode[2]."-".$dateExplode[1];
                    // $report = new Report();
                    $date                               = $dateFix;
                    $app                                = $dataArray[$i]['app'];
                    $ad_unit                            = $dataArray[$i]['ad_unit'];
                    $admob_network_requests             = $dataArray[$i]['admob_network_requests'];  
                    $matched_requests                   = $dataArray[$i]['matched_requests'];
                    $match_rate_persen                  = $dataArray[$i]['match_rate'];
                    $impressions                        = $dataArray[$i]['impressions'];
                    $show_rate_persen                   = $dataArray[$i]['show_rate'];
                    $clicks                             = $dataArray[$i]['clicks'];
                    $impressions_ctr_persen             = $dataArray[$i]['impressions_ctr'];
                    $admob_network_request_rpm_idr      = $dataArray[$i]['admob_network_request_rpm_idr'];
                    $impression_rpm_idr                 = $dataArray[$i]['impression_rpm_idr'];
                    $estimated_earnings_idr             = $dataArray[$i]['estimated_earnings_idr'];
                    $active_view_eligible_impressions   = $dataArray[$i]['active_view_eligible_impressions'];
                    $measurable_impressions             = $dataArray[$i]['measurable_impressions'];
                    $viewable_impressions               = $dataArray[$i]['viewable_impressions'];
                    $measurable_impressions_persen      = $dataArray[$i]['measurable_impressions'];
                    $viewable_impressions_persen        = $dataArray[$i]['viewable_impressions'];
                    // $report->save();
                    $updateOrCreate = Report::updateOrCreate([
                        'date'                             => $date,
                        'app'                              => $app,
                        'ad_unit'                          => $ad_unit,
                    ],
                    [
                        'date'                             => $date,
                        'app'                              => $app,
                        'ad_unit'                          => $ad_unit,
                        'admob_network_requests'           => $admob_network_requests,
                        'matched_requests'                 => $matched_requests,
                        'match_rate_persen'                => $match_rate_persen,
                        'impressions'                      => $impressions,
                        'show_rate_persen'                 => $show_rate_persen,
                        'clicks'                           => $clicks,
                        'impressions_ctr_persen'           => $impressions_ctr_persen,
                        'admob_network_request_rpm_idr'    => $admob_network_request_rpm_idr,
                        'impression_rpm_idr'               => $impression_rpm_idr,
                        'estimated_earnings_idr'           => $estimated_earnings_idr,
                        'active_view_eligible_impressions' => $active_view_eligible_impressions,
                        'measurable_impressions'           => $measurable_impressions,
                        'viewable_impressions'             => $viewable_impressions,
                        'measurable_impressions_persen'    => $measurable_impressions_persen,
                        'viewable_impressions_persen'      => $viewable_impressions_persen,
                    ]

                    );                   
                }
            }
        }
        return back()->with('error','Please Check your file, Something is wrong there.');
    }

    public function createImport(){
        return view('admin.report.importfile');
    }

    public function currentUser(){
        return Auth::user();
    }

}

