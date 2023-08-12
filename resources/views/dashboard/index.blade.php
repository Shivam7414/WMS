@extends('layouts.app')

@section('content')
<div class="row page-heading">
    <div class="col-lg-6">
        <h2>Dashboard</h2>
        <p id="greeting"></p>
    </div>
    <div class="col-lg-6">
        <ol class="breadcrumb float-end">
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
    </div>
</div>
<div class="content">
    <div class="row">
        <div class="col-lg-3">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>123</h3>
                    <p>Customers</p>
                </div>
                <div class="icon">
                    <i class="fas fa-users"></i>
                </div>
                <a href="{{ url('customer/index') }}" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>315</h3>
                    <p>Items</p>
                </div>
                <div class="icon">
                    <i class="fas fa-shopping-cart"></i>
                </div>
                <a href="{{ url('customer/index') }}" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
    </div>
    <div>
        <canvas id="customerChart" height="300px"></canvas>
    </div>
</div>
@endsection

@section('scripts')
<script>
    let messageElement = document.getElementById("greeting");
    let now = new Date();
    let hour = now.getHours();
    let message;
    if (hour < 12) {
        message = "Good morning! Let's get to work.";
    } else if (hour < 18) {
        message = "Good afternoon! Let's get to work.";
    } else {
        message = "Good evening! Let's get to work.";
    }
    messageElement.innerHTML = message;

    var ctx = document.getElementById('customerChart').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: {!! json_encode($customerCount['labels']) !!},
            datasets: [{
                label: 'Customer Count',
                data: {!! json_encode($customerCount['data']) !!},
                backgroundColor: 'rgba(51, 100, 255)',
                borderColor: 'rgba(30, 144, 255, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            backgroundColor: 'white',
            scales: {
                y: {
                    beginAtZero: true
                }
            },
            plugins: {
                title: {
                    display: true,
                    text: 'Customer Count'
                },
                tooltip: {
                    mode: 'index',
                    intersect: false
                },
                legend: {
                    position: 'bottom'
                }
            }
        }
    });

    function updateChartData(labels, data) {
        chart.data.labels = labels;
        chart.data.datasets[0].data = data;
        chart.update();
    }
</script>
@endsection