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
              NIK
            </th>
            <th>
              Tanggal Kunjungan
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
          <tr>
            <td class="py-1">
              <img src="../../images/faces/face1.jpg" alt="image" />
            </td>
            <td>
              Herman Beck
            </td>
            <td>
              <div class="progress">
                <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25"
                  aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </td>
            <td>
              $ 77.99
            </td>
            <td>
              May 15, 2015
            </td>
          </tr>
          <tr>
            <td class="py-1">
              <img src="../../images/faces/face2.jpg" alt="image" />
            </td>
            <td>
              Messsy Adam
            </td>
            <td>
              <div class="progress">
                <div class="progress-bar bg-danger" role="progressbar" style="width: 75%" aria-valuenow="75"
                  aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </td>
            <td>
              $245.30
            </td>
            <td>
              July 1, 2015
            </td>
          </tr>
          <tr>
            <td class="py-1">
              <img src="../../images/faces/face3.jpg" alt="image" />
            </td>
            <td>
              John Richards
            </td>
            <td>
              <div class="progress">
                <div class="progress-bar bg-warning" role="progressbar" style="width: 90%" aria-valuenow="90"
                  aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </td>
            <td>
              $138.00
            </td>
            <td>
              Apr 12, 2015
            </td>
          </tr>
          <tr>
            <td class="py-1">
              <img src="../../images/faces/face4.jpg" alt="image" />
            </td>
            <td>
              Peter Meggik
            </td>
            <td>
              <div class="progress">
                <div class="progress-bar bg-primary" role="progressbar" style="width: 50%" aria-valuenow="50"
                  aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </td>
            <td>
              $ 77.99
            </td>
            <td>
              May 15, 2015
            </td>
          </tr>
          <tr>
            <td class="py-1">
              <img src="../../images/faces/face5.jpg" alt="image" />
            </td>
            <td>
              Edward
            </td>
            <td>
              <div class="progress">
                <div class="progress-bar bg-danger" role="progressbar" style="width: 35%" aria-valuenow="35"
                  aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </td>
            <td>
              $ 160.25
            </td>
            <td>
              May 03, 2015
            </td>
          </tr>
          <tr>
            <td class="py-1">
              <img src="../../images/faces/face6.jpg" alt="image" />
            </td>
            <td>
              John Doe
            </td>
            <td>
              <div class="progress">
                <div class="progress-bar bg-info" role="progressbar" style="width: 65%" aria-valuenow="65"
                  aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </td>
            <td>
              $ 123.21
            </td>
            <td>
              April 05, 2015
            </td>
          </tr>
          <tr>
            <td class="py-1">
              <img src="../../images/faces/face7.jpg" alt="image" />
            </td>
            <td>
              Henry Tom
            </td>
            <td>
              <div class="progress">
                <div class="progress-bar bg-warning" role="progressbar" style="width: 20%" aria-valuenow="20"
                  aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </td>
            <td>
              $ 150.00
            </td>
            <td>
              June 16, 2015
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>

@endsection

@endsection