@extends('layouts.main')

@section('content')
@include('partials.sidebar')

@section('main-content')
<div class="card px-5">
  <div class="card-body">
    <h4 class="card-title">Inline forms</h4>
    <p class="card-description">
      Use the <code>.form-inline</code> class to display a series of labels, form controls, and buttons on
      a single horizontal row
    </p>
    <form class="form-inline">
      <label class="sr-only" for="inlineFormInputName2">Name</label>
      <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Jane Doe">

      <label class="sr-only" for="inlineFormInputGroupUsername2">Username</label>
      <div class="input-group mb-2 mr-sm-2">
        <div class="input-group-prepend">
          <div class="input-group-text">@</div>
        </div>
        <input type="text" class="form-control" id="inlineFormInputGroupUsername2" placeholder="Username">
      </div>
      <div class="form-check mx-sm-2">
        <label class="form-check-label">
          <input type="checkbox" class="form-check-input" checked>
          Remember me
        </label>
      </div>
      <button type="submit" class="btn btn-primary mb-2">Submit</button>
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username">
        <div class="input-group-append">
          <button class="btn btn-sm btn-primary" type="button">Search</button>
        </div>
      </div>
    </form>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>
              No
            </th>
            <th>
              NIK
            </th>
            <th>
              Tanggal
            </th>
            <th>
              Nama Pasien
            </th>
            <th>
              Alamat
            </th>
            <th>
              Umur
            </th>
            <th>
              Poli
            </th>
            <th>
              Diagnosa
            </th>
          </tr>
        </thead>
        <tbody>
          @foreach($pasien as $p)
          <tr>
            <td>
              {{ $loop->iteration }}
            </td>
            <td>
              {{ $p->nik }}
            </td>
            <td>
              {{ $p->tanggal_kunjungan }}
            </td>
            <td>
              {{ $p->nama_pasien }}
            </td>
            <td>
              {{ $p->alamat }}
            </td>
            <td>
              {{ $p->umur }}
            </td>
            <td>
              {{ $p->poli }}
            </td>
            <td>
              {{ $p->diagnosa }}
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      <div class="page mt-4">
        {{ $pasien->links('vendor.pagination.bootstrap-5') }}
      </div>
    </div>
  </div>
</div>

@endsection

@endsection