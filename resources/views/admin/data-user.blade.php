@extends('layouts.main')

@section('content')
@include('partials.sidebar')

@section('main-content')
<div class="card-body p-5">
  <h2 class="card-title">Data Akun User</h2>
  <form class="form-inline">
    <div class="input-group">
      <input type="text" name="filter[name]" class="form-control" placeholder="Cari nama user" aria-label="Search...">
      <div class="input-group-append">
        <button class="btn btn-sm btn-primary" type="submit">Search</button>
      </div>
    </div>
  </form>
  <div class="table-responsive pt-3">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>
            #
          </th>
          <th>
            Username
          </th>
          <th>
            Email
          </th>
          <th>
            Role
          </th>
          <th>
            Date
          </th>
          <th>
            Action
          </th>
        </tr>
      </thead>
      <tbody>
        @foreach ($users as $user)
        <tr>
          <td>
            {{ $loop->iteration }}
          </td>
          <td>
            {{ $user->name }}
          </td>
          <td>
            {{ $user->email }}
          </td>
          <td>
            {{ $user->role }}
          </td>
          <td>
            {{ $user->created_at }}
          </td>
          <td class="d-flex justify-content-around">
            <a href="{{ route('update-user', $user->id) }}" class="btn btn-sm btn-outline-warning">Edit</a>
            <form action="{{ route('delete-user', $user->id) }}" method="POST">
              @csrf
              @method('DELETE')
              <input type="submit" value="Delete" class="btn btn-sm btn-outline-danger"
                onclick="return confirm('Are you sure?')">
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection

@endsection