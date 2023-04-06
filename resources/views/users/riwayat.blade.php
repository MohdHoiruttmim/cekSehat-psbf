@extends('layouts.main')

@section('content')
@include('partials.sidebar')

@section('main-content')
<div class="container">
  <h2 class="text-dark mt-3 text-center">Lihat Riwayat Checkup</h2>
  <form action="{{ route('riwayat') }}">
    <div class="form-group mt-5 row d-flex justify-content-center">
      <div class="input-group col-5">
        <input type="text" class="form-control" name="nik" placeholder="Masukkan NIK" aria-label="Recipient's username">
        <div class="input-group-append">
          <button class="btn btn-sm btn-primary" type="submit">Search</button>
        </div>
      </div>
    </div>
  </form>
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
        @if($data != 'empty')
        <tbody>
          @foreach($data as $p)
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
      <!-- count the data -->
      <div class="page mt-4">
        {{ $data->links('vendor.pagination.bootstrap-5') }}
      </div>
      @endif
    </div>
  </div>
</div>
@endsection

@endsection