@extends('layouts.main')

@section('content')
@include('partials.sidebar')

@section('main-content')
<div class="card px-5">
  <div class="card-body">
    <h4 class="card-title">Basic Table</h4>
    <p class="card-description">
      Add class <code>.table</code>
    </p>
    <div class="table-responsive">
      <table class="table">
        <thead>
          <tr>
            <th>No</th>
            <th>Date</th>
            <th>Username</th>
            <th>Email</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($logs as $item)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->time }}</td>
            <td>{{ $item->username }}</td>
            <td>{{ $item->email }}</td>
            @php echo $item->action @endphp
          </tr>
          @endforeach
        </tbody>
      </table>
      {{ $logs->links('vendor.pagination.bootstrap-5') }}
    </div>
  </div>
</div>

@endsection

@endsection