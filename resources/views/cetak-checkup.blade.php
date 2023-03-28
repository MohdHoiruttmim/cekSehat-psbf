@extends('layouts.main')

@section('content')
@section('main-content')
<div class="card px-5">
  <div class="title py-3">
    <h1>Rekap Data Pasien</h1>
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
    </div>
  </div>
</div>

@endsection

@endsection