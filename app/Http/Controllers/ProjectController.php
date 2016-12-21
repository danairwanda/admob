<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use App\Project;
use App\Application;
use App\User;
use App\AdUnit;
use App\Http\Requests;
use View;

class ProjectController extends Controller{
   public function index(Request $request){
        $projects = Project::orderBy('id','ASC')
                    ->with(['user','adunit','application'])
                    ->get();
                    // ->get();
        // dd($projects->toArray());
        // die();
        return view::make('admin.projects.project', compact('projects','user','adunit','application'))
                    ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    public function search(Request $request){
        $cari       = $request->get('search');
        $projects   = Project::where('share','LIKE','%'.$cari.'%')
                        ->paginate(2);
        return view::make('admin.projects.project', compact('projects'))
            ->with('i', ($request->input('page', 1) - 1 ) * 2);
    }

    public function create(Request $request){
        $application = Application::orderBy('id','ASC')
                    ->get();
        $users = User::orderBy('id','ASC')
                    ->get();        

        return view::make('admin.projects.create_project', compact('application','users'));
    }

    public function store(Request $request){
        // validate form
        $this->validate($request, [
            'apps'   =>  'required',
            'adunit' =>  'required',
            'share'  =>  'required'
        ]);
        // save 

        $project                = new Project();
        $project->fk_user       = $request->user;
        $project->fk_app        = $request->apps;
        $project->fk_adunit     = $request->adunit;
        $project->share         = $request->share;
        $project->name_apps     = $request->name_apps;
        $project->name_adunit   = $request->name_adunit;
        $project->save();

        // dd($project);
        // redirect 
        return redirect('projects')->with('message','Data hasbeen saved!');
    }

    public function edit($id){
        $projects       = Project::findOrFail($id);      
        $application    = Application::orderBy('id','ASC')
                            ->get();
        $adunit         = AdUnit::orderBy('id','ASC')
                            ->get();
        $users          = User::orderBy('id','ASC')
                            ->get();
        // dd($projects->toArray());  
        // mengarahkan pada view edit
        return view::make('admin.projects.edit_project',compact('projects','adunit','application','users'));
    }

    public function update(Request $request, $id){
        // validate
        $this->validate($request, [
            'user'          =>  'required',
            'apps'          =>  'required',
            'name_apps'     =>  'required',
            'adunit'        =>  'required',
            'name_adunit'   =>  'required',
            'share'         =>  'required'
        ]);
        // update
        $projects = Project::findOrFail($id);
        $projects->fk_user      = $request->user;
        $projects->fk_app       = $request->apps;
        $projects->name_apps    = $request->name_apps;
        $projects->fk_adunit    = $request->adunit;
        $projects->name_adunit  = $request->name_adunit;
        $projects->share        = $request->share;
        $projects->save();
        // dd($projects->toArray());
        // die();
        // redirect
        return redirect('projects')->with('message','Data hasbeen updated!');   
    }

    public function destroy($id){
        $projects = Project::findOrFail($id);
        $projects->delete();
        return redirect('projects')->with('message','Data hasbeen deleted!');
    }

    public function unitDropdown(Request $request){
        $unit_id = $request->input('unit_id');
        // dd($unit_id);
        // die();
        $adunit = AdUnit::where('fk_app','=',$unit_id)
                        ->get();
        //dd($adunit);
        // die();
        return Response::json($adunit);
    }
}
