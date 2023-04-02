@extends('layouts.main')
@section('title', $title)
@section('content')
@include('partials.sidebar')

@section('main-content')
@include('partials.nav')
<div class="container pt-3">
  <div class="card-body bg-light text-dark my-3">
    <h2>Dashboard</h2>
  </div>
  <div class="chart-wrapper d-flex" style="position: relative; height:40vh; width:80vw">
    <canvas id="barplot" class="border"></canvas>
    <canvas id="pie" class="ml-5 border"></canvas>
  </div>
  @if(Auth::user()->role == 'admin')
  <div class="card-body bg-light mt-3 d-flex justify-content-around">
    <a href="{{ route('checkup-new') }}">
      <button type="button" class="btn btn-lg btn-success btn-icon-text">
        <i class="mdi mdi-account-plus btn-icon-prepend"></i>
        Pasien Baru
      </button>
    </a>
    <a href="{{ route('data-user') }}">
      <button type="button" class="btn btn-info btn-icon-text">
        <i class="mdi mdi-account-multiple btn-icon-prepend"></i>
        User
      </button>
    </a>
    <a href="{{ route('checkup') }}">
      <button type="button" class="btn btn-danger btn-icon-text">
        <i class="mdi mdi-login-variant btn-icon-prepend"></i>
        Check Log
      </button>
    </a>
    <a href="{{ route('log-activity') }}">
      <button type="button" class="btn btn-warning btn-icon-text">
        <i class="mdi mdi-content-paste btn-icon-prepend"></i>
        Log Activity
      </button>
    </a>
  </div>
  @endif
</div>
@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>

  // console.log('{!! json_encode($label) !!}');
  const barplot = document.getElementById('barplot');
  const pie = document.getElementById('pie');

  const barplotChart = new Chart(barplot, {
    type: 'bar',
    data: {
      /*
       This code takes a PHP variable $label and encodes it into a JSON string using the json_encode function. The resulting JSON string is then passed as a parameter to the JavaScript JSON.parse() method, which converts the JSON string into a JavaScript object that can be used in further JavaScript processing. The use of the double exclamation marks !! is just a shorthand way of escaping any special characters that might be present in the JSON string.
      */
      labels: JSON.parse('{!! json_encode($label) !!}'),
      datasets: [{
        label: ['Poli'],
        data: JSON.parse('{!! json_encode($count) !!}'),
        borderWidth: 1,
        backgroundColor: [
          'rgb(255, 99, 132)',
          'rgb(54, 162, 235)',
          'rgb(255, 205, 86)',
          'rgb(75, 192, 192)',
          'rgb(153, 102, 255)',
          'rgb(255, 159, 64)',
          'rgb(255, 100, 132)',
          'rgb(50, 50, 132)',
        ],
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });

  const pieplotChart = new Chart(pie, {
    type: 'pie',
    data: {
      labels: JSON.parse('{!! json_encode($label_pie) !!}'),
      // labels: ['Red', 'Blue', 'Yellow'],
      datasets: [{
        label: 'Jumlah',
        data: JSON.parse('{!! json_encode($count_pie) !!}'),
        backgroundColor: [
          'rgb(255, 99, 132)',
          'rgb(54, 162, 235)',
          'rgb(255, 205, 86)',
          'rgb(75, 192, 192)',
          'rgb(153, 102, 255)',
          'rgb(255, 159, 64)',
          'rgb(255, 100, 132)',
          'rgb(50, 50, 132)',
        ],
        hoverOffset: 4
      }]
    },
    options: {
      responsive: true,
      plugins: {
        legend: {
          display: false,
        },
        title: {
          display: true,
          text: 'Diagnosa Penyakit'
        }
      }
    },
  });
</script>
@endsection

@endsection