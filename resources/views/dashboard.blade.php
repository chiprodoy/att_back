@extends('layouts.app')

@section('title', 'Dashboard')

@section('header')
    <h1 class="m-0">Selamat datang, {{ Auth::user()->name }}!</h1>
    <p class="mb-4">Anda berhasil login.</p>
@endsection

@section('content')
<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="small-box bg-purple">
                <div class="inner">
                    <h3>{{ $mcuCount }}</h3>
                    <p>Total Data MCU</p>
                </div>
                <div class="icon">
                    <i class="fas fa-notes-medical"></i>
                </div>
            </div>
        </div>
        <div class="col-md-8 mb-4">
            <div class="card card-info">
                <div class="card-header">
                    <h5 class="card-title mb-0">Statistik Permit Status</h5>
                </div>
                <div class="card-body d-flex justify-content-center align-items-center" style="min-height:220px;">
                    <div style="max-width:260px; width:100%;">
                        <canvas id="permitPieChart" width="260" height="180"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const ctx = document.getElementById('permitPieChart').getContext('2d');
    new Chart(ctx, {
        type: 'pie',
        data: {
            labels: {!! json_encode($chartLabels) !!},
            datasets: [{
                data: {!! json_encode($chartData) !!},
                backgroundColor: [
                    '#007bff',
                    '#28a745',
                    '#ffc107',
                    '#dc3545'
                ],
            }]
        },
        options: {
            responsive: false,
            plugins: {
                legend: { position: 'bottom' }
            }
        }
    });
});
</script>