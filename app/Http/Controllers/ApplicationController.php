<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Application;
use App\Http\Requests;
use View;

class ApplicationController extends Controller{
    public function index(Request $request){
        // menampilkan seluruh data dengan urutan z-a beserta paginasi
        $apps = Application::orderBy('id','ASC')->paginate(5);
        // return view admin apps 
        return view::make('admin.applications.apps', compact('apps'))
            ->with('i', ($request->input('page', 1) - 1) * 5); 
    }

    public function create(){
        // memanggil halaman create aplikasi
        return view::make('admin.applications.create_apps');
    }

    public function store(Request $request){
        // validasi form
        $this->validate($request,[
            'idapps'    =>  'required',
            'name'      =>  'required'
        ]);
        // dd($request->all());
        // tambah data aplikasi
        $app = new Application;
        $app->app_id    = $request->idapps; 
        $app->name      = $request->name;
        $app->save();
        // redirect ke halaman apps
        return redirect('applications')->with('message','data hasbeen saved!');

    }

   public function show($id){
        //
    }

    public function edit($id){
        // ini untuk menemukan id
        $app = Application::findOrFail($id);
        // memanggil halaman edit aplikasi
        return view::make('admin.applications.edit_apps', compact('app'));
    }

    public function update(Request $request, $id) {
        // validasi form
        $this->validate($request, [
            'idapps'    =>  'required',
            'name'      =>  'required'
        ]);
        // simpan edit aplikasi
        $app = Application::findOrFail($id);
        $app->app_id    =  $request->idapps;
        $app->name      =  $request->name;
        $app->save();
        // redirect ke halaman apps beserta message
        return redirect('applications')->with('message','data hasbeen updated!');
    }
    public function destroy($id){
        // menemukan id aplikasi
        $app = Application::findOrFail($id);
        // delete data
        $app->delete();
        // redirect to home page with message
        return redirect('applications')->with('message','data hasbeen deleted!');
    }
    public function search(Request $request){
        $cari   = $request->get('search');
        $apps   = Application::where('name','LIKE', '%'.$cari.'%')
                    ->paginate(2);
        return view::make('admin.applications.apps', compact('apps'))
                ->with('i', ($request->input('page', 1) - 1) * 5);
    }
}
