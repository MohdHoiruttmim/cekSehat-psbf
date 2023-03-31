@extends('layouts.main')

@section('content')
@include('partials.sidebar')

@section('main-content')
<div class="card-body p-5">
  <h2 class="card-title bg-warning text-white p-3">Edit Akun Pengguna</h2>
  <form class="forms-sample" method="POST" action="{{ route('update-user', $user->id) }}">
    @csrf
    @method('PATCH')
    <div class="form-group">
      <label for="exampleInputUsername1">Username</label>
      <input type="text" name="name" class="form-control" id="exampleInputUsername1" placeholder="Username"
        value="{{ $user->name }}" required>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Email address</label>
      <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Email"
        value="{{ $user->email }}" required>
    </div>
    <div class="form-group">
      <label class="col-form-label">Gender</label>
      <select class="form-control" name="role">
        <!-- <option value="admin">Admin</option>
        <option value="user">User</option> -->
        <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
        <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
      </select>
    </div>
    <button type="submit" class="btn btn-warning mr-2">Update</button>
    <a href="{{ route('data-user') }}" class="btn btn-light">Cancel</a>
  </form>
</div>

@endsection

@endsection