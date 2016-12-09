@extends('layouts.app')
@section('content')
<div class="container spark-screen">
    <div class="row">
        <div class="col-md-10 col-lg-offset-1"> 
            <div class="panel panel-default">
            {{ Session::get('message') }}
            <div class="panel-heading">
                <h4><i class="fa fa-users"></i><strong> DAFTAR USER</strong></h4><hr>
                <div class=row>
                    <div class="col-md-6">
                        <a href="{{ route('create') }}" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Tambah</a>
                        <a href="{{ route('users') }}" class="btn btn-success"><i class="fa fa-refresh"></i> Semua Data</a>
                    </div>
                    <div class="col-md-2">
                    </div>
                    <!-- Form Pencarian -->
                    <div class="col-md-4">
                        {!! Form::open(['method'=>'GET','url'=>'cariuser','role'=>'search'])  !!}
                        <div class="input-group custom-search-form">
                            <input type="text" class="form-control" name="search" placeholder="Search...">
                            <span class="input-group-btn">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="submit"><i class="fa fa-search"></i> Cari</button>
                                 </span>
                             </span>
                         </div>
                         {!! Form::close() !!}
                    </div>
                </div>
                </div>
                        <div class="panel-body">
                            <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td> 
                                    @if($user->isadmin == 1) 
                                        {{ "Admin" }}
                                    @else
                                        {{ "User"  }}
                                    @endif 
                                    </td>
                                    <td>
                                        <form method="POST" action="{{ route('delete', $user->id) }}" accept-charset="UTF-8">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <a href="{{ route('edit', $user->id) }}" class="btn btn-info"><span class="glyphicon glyphicon-edit"></span> Edit</a>  
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Anda yakin akan menghapus data ?');"><span class="glyphicon glyphicon-trash"></span> Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        </div>
                    </div>
                    {!! $users->render() !!}
                </div>
            </div>
        </div>    
    </div>
</div>  
@endsection

