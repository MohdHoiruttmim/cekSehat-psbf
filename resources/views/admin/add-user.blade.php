@extends('layouts.main')

@section('content')
@include('partials.sidebar')

@section('main-content')
<div class="card-body p-5">
  <h4 class="card-title">Daftar Akun Pengguna</h4>
  <p class="card-description">
    Basic form layout
  </p>
  <form class="forms-sample" method="POST" action="{{ route('add-user') }}">
    @csrf
    <div class="form-group">
      <label for="exampleInputUsername1">Username</label>
      <input type="text" name="name" class="form-control" id="exampleInputUsername1" placeholder="Username" required>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Email address</label>
      <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Email" required>
    </div>
    <div class="form-group">
      <label class="col-form-label">Gender</label>
      <select class="form-control" name="role">
        <option value="admin">Admin</option>
        <option value="user">User</option>
      </select>
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Password</label>
      <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password"
        required>
    </div>
    <button type="submit" class="btn btn-primary mr-2">Submit</button>
    <button class="btn btn-light">
      <a href="{{ route('data-user') }}" class="text-gray ">Cancel</a>
    </button>
  </form>
</div>

@endsection

@endsection