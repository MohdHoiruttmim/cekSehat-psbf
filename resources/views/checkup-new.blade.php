@extends('layouts.main')

@section('content')
@include('partials.sidebar')

@section('main-content')
<div class="card-body p-5">
  <h2 class="card-title bg-danger p-3 text-white">Pasien Baru</h2>
  <form class="forms-sample" action="{{ route('checkup-store') }}" method="POST">
    @csrf
    <div class="form-group">
      <label for="exampleInputName1">NIK</label>
      <input type="number" name="nik" min="0" class="form-control" id="exampleInputName1" placeholder="NIK" required>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail3">Nama Pasien</label>
      <input type="text" name="nama_pasien" class="form-control" id="exampleInputEmail3" placeholder="Nama Pasien"
        required>
    </div>
    <div class="form-group">
      <label for="exampleInputPassword4">Alamat</label>
      <input type="text" name="alamat" class="form-control" id="exampleInputPassword4" placeholder="Alamat" required>
    </div>
    <div class="form-group">
      <label for="exampleUsia">Usia</label>
      <input type="number" name="umur" min="1" class="form-control" id="exampleUsia" placeholder="Usia" required>
    </div>
    <div class="form-group">
      <label for="exampleSelectGender">Poli</label>
      <select class="form-control" name="poli" id="exampleSelectGender">
        <option value="" disabled selected>Pilih Poli</option>
        <option value="anak">Anak</option>
        <option value="gigi dan mulut">Gigi dan Mulut</option>
        <option value="jantung">Jantung</option>
        <option value="kulit dan kelamin">Kulit dan Kelamin</option>
        <option value="mata">Mata</option>
        <option value="paru">Paru</option>
        <option value="penyakit dalam">Penyakit Dalam</option>
        <option value="saraf">Saraf</option>
      </select>
    </div>
    <div class="form-group">
      <label for="exampleTextarea1">Diagnosa</label>
      <textarea class="form-control" id="exampleTextarea1" rows="4" name="diagnosa"></textarea>
    </div>
    <button type="submit" class="btn btn-danger mr-2">Submit</button>
    <button class="btn btn-light">Cancel</button>
  </form>
</div>

@endsection

@endsection