@extends('admin.layout')
@section('content')
<!-- page content -->
<div class="right_col" role="main">
<div class="container spark-screen">
    <div class="row">
        <div class="col-md-12 col-lg-offset-0"> 
            <div class="panel panel-default">
            {{ Session::get('message') }}
            <div class="panel-heading">
                <h4><i class="fa fa-users"></i><strong> DAFTAR USER</strong></h4>
{{--                 <div class=row>
                    <div class="col-md-6">
                        <a href="{{ route('create') }}" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Tambah</a>
                        <a href="{{ route('users') }}" class="btn btn-success"><i class="fa fa-refresh"></i> Semua Data</a>
                    </div>
                    <div class="col-md-2">
                    </div>
                </div> --}}
                </div>
                        <div class="panel-body">
                            <table class="table table-striped table-hover" id="datatable-responsive">
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
                                            <a href="{{ route('users') }}" class="btn btn-success"><i class="fa fa-refresh"></i></a>
                                            <a href="{{ route('create') }}" class="btn btn-primary"><i class="fa fa-plus-circle"></i> </a>
                                            <a href="{{ route('edit', $user->id) }}" class="btn btn-info"><span class="glyphicon glyphicon-edit"></span></a> 
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Anda yakin akan menghapus data ?');"><span class="glyphicon glyphicon-trash"></span></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>    
    </div>
@endsection

