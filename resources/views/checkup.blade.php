@extends('layouts.main')

@section('content')
@include('partials.sidebar')

@section('main-content')
<div class="card px-4">
  <div class="card-body">
    <h2 class="mb-4">Riwayat Checkup</h2>
    <div class="row">
      <form class="form-inline">
        <select class="form-control" name="filter[poli]">
          <option value="">Semua Poli</option>
          <option value="anak">Anak</option>
          <option value="gigi dan mulut">Gigi dan Mulut</option>
          <option value="jantung">Jantung</option>
          <option value="kulit dan kelamin">Kulit dan Kelamin</option>
          <option value="mata">Mata</option>
          <option value="paru">Paru</option>
          <option value="penyakit dalam">Penyakit Dalam</option>
          <option value="saraf">Saraf</option>
        </select>
        <input type="date" name="start" class="form-control col-2" placeholder="dd/mm/yyyy" />
        <input type="date" name="end" class="form-control col-2" placeholder="dd/mm/yyyy" />
        <div class="input-group">
          <input type="text" name="filter[nama_pasien]" class="form-control" placeholder="Cari nama pasien..."
            aria-label="Search...">
          <div class="input-group-append">
            <button class="btn btn-sm btn-primary" type="submit">Search</button>
          </div>
        </div>
      </form>
      <a href="/cetak?search=pdf" target="_blank">
        <button type="button" class="btn btn-sm btn-danger btn-icon-text mx-1">
          PDF
          <i class="mdi mdi-printer btn-icon-append"></i>
        </button>
      </a>
      <a href="/cetak?search=excel" target="_blank">
        <button type="button" class="btn btn-sm btn-success btn-icon-text mx-1">
          Excel
          <i class="mdi mdi-printer btn-icon-append"></i>
        </button>
      </a>
      <a href="/cetak?search=msword" target="_blank">
        <button type="button" class="btn btn-sm btn-info btn-icon-text mx-1">
          Word
          <i class="mdi mdi-printer btn-icon-append"></i>
        </button>
      </a>
    </div>
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