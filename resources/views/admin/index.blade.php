@extends('layouts.main')

@section('content')
@include('partials.sidebar')

@section('main-content')
@include('partials.nav')
<div class="container pt-3">
  <h1> ini adalah halaman admin</h1>
  <div class="chart-wrapper d-flex" style="position: relative; height:40vh; width:80vw">
    <canvas id="barplot"></canvas>
    <canvas id="pie"></canvas>
  </div>
</div>
@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  const barplot = document.getElementById('barplot');
  const pie = document.getElementById('pie');

  const barplotChart = new Chart(barplot, {
    type: 'bar',
    data: {
      labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
      datasets: [{
        label: ['# of Votes'],
        data: [12, 19, 3, 5, 2, 3],
        borderWidth: 1,
        backgroundColor: [
          'rgb(255, 99, 132)',
          'rgb(54, 162, 235)',
          'rgb(255, 205, 86)',
          'rgb(75, 192, 192)',
          'rgb(153, 102, 255)',
          'rgb(255, 159, 64)'
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
      labels: ['Red', 'Blue', 'Yellow'],
      datasets: [{
        label: '# of Votes',
        data: [12, 19, 3],
        backgroundColor: [
          'rgb(255, 99, 132)',
          'rgb(54, 162, 235)',
          'rgb(255, 205, 86)'
        ],
        hoverOffset: 4
      }]
    },
    options: {
      responsive: true,
      plugins: {
        legend: {
          position: 'top',
        },
        title: {
          display: true,
          text: 'Chart.js Pie Chart'
        }
      }
    },
  });

  canvas.parentNode.style.height = '128px';
  canvas.parentNode.style.width = '128px';
</script>
@endsection

@endsection