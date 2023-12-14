@extends('app')
@section('content')
<div class="card card-primary">

  <!-- /.card-header -->
  <!-- form start -->
  <form role="form" method = 'Post' action="{{route('admins.store')}}">
    @csrf
    <input type="hidden" name="role"  value="admin">

    <div class="card-body">
      <div class="form-group">
        <label for="exampleInputEmail1">Name</label>
        <input type="text" class="form-control" name="name" placeholder="Enter Name">
        {{$errors->first('name')}}
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" class="form-control" name="email" placeholder="Enter email">
        {{$errors->first('email')}}
      </div>

      <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" name="password" placeholder="Password">
        {{$errors->first('password')}}
      </div>

    </div>
    <!-- /.card-body -->

    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>
</div>
    <!-- /.card-body -->
  </div>
@endsection