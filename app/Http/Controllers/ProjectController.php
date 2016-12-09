<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\User;
use App\AdUnit;
use App\Http\Requests;
use View;

class ProjectController extends Controller{
   public function index(Request $request){
        $projects = Project::orderBy('id','ASC')
                    ->with(['user','adunit','application'])
                    ->paginate(5);
                    // ->get();
        // dd($projects->toArray());
        return view::make('admin.projects', compact('projects','user','adunit','application'))
                    ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    public function search(Request $request){
        $cari       = $request->get('search');
        $projects   = Project::where('share','LIKE','%'.$cari.'%')
                        ->paginate(2);
        return view::make('admin.projects', compact('projects'))
            ->with('i', ($request->input('page', 1) - 1 ) * 2);
    }
}
