<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Validator;
use View;

class UserController extends Controller{
    public function index(){
        // menampilkan seluruh data dengan urutan z-a beserta paginasi
        $users = User::orderBy('id','DESC')->paginate(2);
        // return view('admin.admin_user');
        return view::make('admin.user_index',compact('users'));
    }
    
    public function create(){
        // memanggil halaman create_user 
        return view::make('admin.create_user');
    }

    public function store(Request $request){
        // validasi form
        $this->validate($request, [
            'name'          =>  'required',
            'email'         =>  'required|email',
            'password'      =>  'required|min:6',
            'isadmin'    =>  'required'
        ]);
        // dd($request->all());
        // tambah data user
        $user = new User;
        $user->name     = $request->name;
        $user->email    = $request->email;
        $user->password = bcrypt($request->password);
        $user->isadmin  = $request->isadmin;
        $user->save();
        // redirect ke halaman home beserta pesan berhasil
        return redirect('users')->with('message','data hasbeen saved!');
    }
    
     public function show($id){
        //
    }
    public function edit($id){
        //  ini buat menemukan id 
        $user = User::findOrFail($id);
        // memanggil halaman edit_user
        return view::make('admin.edit_user', compact('user'));
    }

    public function update(Request $request, $id){
        // mengubah data users
        $this->validate($request, [
            'name'          =>  'required',
            'email'         =>  'required|email',
            'password'      =>  'required|min:6',
            'isadmin'       =>  'required'
        ]);
        // dd($request->all());
         // update users
        $user = User::findOrFail($id);
        $user->name     = $request->name;
        $user->email    = $request->email;
        $user->password = bcrypt($request->password);
        $user->isadmin  = $request->isadmin;
        $user->save();
        // redirect ke halaman home beserta pesan berhasil
        return redirect('users')->with('message','data hasbeen update!');

    }

    public function destroy($id){
        // menghapus user berdasarkan id
        $user = User::findOrFail($id);
        $user->delete();
        // redirect to home page with message
        return redirect('users')->with('message','data hasbeen deleted!');
    }
}
