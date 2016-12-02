<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AdUnit;
use App\Http\Requests;
use View;

class AdUnitController extends Controller{
    public function index(Request $request){
        /* menampilkan seluruh data AdUnit dengan urutan z-a beserta paginasi sebanyak 5 */
        $adUnits = AdUnit::orderBy('id','ASC')->paginate(5);
        /* menampilkan view AdUnit di folder admin dengan membawa semua data yang diterjemahkan dalam compact dengan urutan nomor secara otomatis */
        return view::make('admin.adUnits', compact('adUnits'))->with('i', ($request->input('page', 1) - 1) * 5);
    }

   public function create(){
        // menampilkan seluruh data
        $adUnits = AdUnit::all();
        // memanggil halaman create unit
        return view::make('admin.create_unit', compact('adUnits'));  
    }

   public function store(Request $request){
        // validasi form
        $this->validate($request, [
            'AdUnit_id' =>  'required',
            'name'      =>  'required',
            'fk_app'    =>  'required'
        ]);
        // simpan adunit
        $adUnit             =  new AdUnit;
        $adUnit->AdUnit_id  =  $request->AdUnit_id;  
        $adUnit->name       =  $request->name;       
        $adUnit->fk_app     =  $request->fk_app;
        $adUnit->save();
        // redirect ke halaman home dengan membawa pesan
        return redirect('AdUnits')->with('message','Data hasbeen saved!'); 
    }

    public function show($id) {
        //
    }

    public function edit($id){
        // menampilkan seluruh data adunit
        $adUnits = AdUnit::findOrFail($id);
        $all     = AdUnit::all();
        // mengarahkan halaman adunit edit dengan membawa data
        return view::make('admin.edit_unit', compact('adUnits','all'));
    }

    public function update(Request $request, $id){
         // validasi form
        $this->validate($request, [
            'AdUnit_id' =>  'required',
            'name'      =>  'required',
            'fk_app'    =>  'required'
        ]);
        // simpan adunit
        $adUnit             =  AdUnit::findOrFail($id);
        $adUnit->AdUnit_id  =  $request->AdUnit_id;  
        $adUnit->name       =  $request->name;       
        $adUnit->fk_app     =  $request->fk_app;
        $adUnit->save();
        // redirect ke halaman home dengan membawa pesan
        return redirect('AdUnits')->with('message','Data hasbeen update!');
    }

    public function destroy($id){
        // menemukan id AdUnit
        $adUnit     =   AdUnit::findOrFail($id);
        // delete data
        $adUnit->delete();
        // redirect home with message
        return redirect('AdUnits')->with('message','Data hasbeen deleted!');
    }
}
