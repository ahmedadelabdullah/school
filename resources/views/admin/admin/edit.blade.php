@extends('app')
@section('content')
<div class="card card-primary">
  <!-- /.card-header -->
  <!-- form start -->
  <form role="form" method = 'Post' action="{{route('admins.update' , $editAdmin)}}">
    @csrf
    @method('PUT')
    <div class="card-body">
      <div class="form-group">
        <label for="exampleInputEmail1">Name</label>
        <input type="text" class="form-control" name="name" placeholder="Enter Name" value="{{$editAdmin->name}}">
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" class="form-control" name="email" placeholder="Enter email" value="{{$editAdmin->email}}">
      </div>

      <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" name="password" placeholder="Password">
        <p>change password if u want</p>
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