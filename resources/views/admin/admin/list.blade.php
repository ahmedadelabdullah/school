@extends('app')
@section('content')
<div class="card">
    <div class="card-header">
      <span class="card-title h1">Total {{$admins->total()}} admins</span>
      <a class="btn btn-primary float-right" href="{{route('admins.create')}}">Add New admin</a>
    </div>
    <!-- /.card-header -->
    <div class="card-body p-0">
      <form  method = 'get' action="{{route('admin.admins.search')}}">
        @csrf    
      <div class="row d-flex align-items-center">
        <div class="card-body col-md-10">
          <div class="form-group">
            <input type="text" class="form-control" name="q" placeholder="Search">
          </div>
        </div>
        <div class="col-md-1">
          <button type="submit" class="btn btn-primary form-group">Submit</button>
        </div>
        <div class="col-md-1">
          <button type="reset" class="btn btn-primary form-group">reset</button>
        </div>
      </div>
      </form>

      <table class="table table-striped">
      @if(session('success'))
        <div class="alert alert-success">
        {{session('success')}}
      </div>
      @endif
        <thead>
          <tr class="text-capitalize">
            <th style="width: 10px">#</th>
            <th>name</th>
            <th>username</th>
            <th>email</th>
            <th>phone</th>
            <th>status</th>
            <th>actions</th>

          </tr>
        </thead>
        <tbody>
          @foreach ($admins as $admin)
          <tr>
            <td>{{$admin->id}}</td>
            <td>{{$admin->name}}</td>
            <td>{{$admin->username}}</td>
            <td>{{$admin->email}}</td>
            <td>{{$admin->role}}</td>
            <td>{{$admin->status}}</td>
            <td class="d-flex">
              {{-- <a class="btn btn-primary mx-1" href="{{route('admins.show' , $admin)}}">Show</a> --}}
              <a class="btn btn-secondary mx-1" href="{{route('admins.edit', $admin)}}">Edit</a>
              <form action="{{route('admins.destroy' , $admin)}}" method="POST" class="mx-1">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger">Delete</button>
              </form>
              
            </td>
          </tr>
          @endforeach

        </tbody>
      </table>
      {{$admins->links()}}
    </div>
    <!-- /.card-body -->
  </div>
@endsection