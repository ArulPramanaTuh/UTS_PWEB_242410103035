@extends('layouts.app')

@section('title', 'Dashboard - Si Basreng')

@section('content')
<div class="text-center mb-5">
  <h1 class="fw-bold spicy-title">🔥 Dashboard Basreng Cak Arul 🔥</h1>
  <p class="text-muted">Selamat datang kembali, <strong>{{ ucfirst($username) }}</strong> 👋</p>
</div>

<div class="row justify-content-center">
  <div class="col-md-3 mb-3">
    <div class="card text-center spicy-card">
      <div class="card-body">
        <h5 class="card-title text-danger">Produk</h5>
        <h2 id="count-produk" class="spicy-number">0</h2>
        <p class="text-muted">Total produk yang tersedia</p>
      </div>
    </div>
  </div>
  <div class="col-md-3 mb-3">
    <div class="card text-center spicy-card">
      <div class="card-body">
        <h5 class="card-title text-warning">Stok</h5>
        <h2 id="count-stok" class="spicy-number">0</h2>
        <p class="text-muted">Total stok produk</p>
      </div>
    </div>
  </div>
  <div class="col-md-3 mb-3">
    <div class="card text-center spicy-card">
      <div class="card-body">
        <h5 class="card-title text-success">Pengguna</h5>
        <h2 id="count-user" class="spicy-number">0</h2>
        <p class="text-muted">Jumlah pengguna aktif</p>
      </div>
    </div>
  </div>
</div>

<div class="mt-5">
  <h4 class="text-center mb-3 spicy-subtitle">📊 Statistik Penjualan Produk</h4>
  <canvas id="salesChart" height="120"></canvas>
</div>

<style>
  .spicy-title {
    color: #ff3c00;
    text-shadow: 0 2px 6px rgba(255, 60, 0, 0.4);
    font-size: 2.2rem;
  }

  .spicy-subtitle {
    color: #ff7043;
    font-weight: 600;
  }

  .spicy-card {
    border: none;
    border-radius: 15px;
    background: linear-gradient(145deg, #fff5f0, #ffe0d4);
    box-shadow: 0 4px 12px rgba(255, 99, 71, 0.2);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
  }

  .spicy-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 20px rgba(255, 87, 34, 0.3);
  }

  .spicy-number {
    color: #d62828;
    font-size: 2rem;
    font-weight: bold;
    text-shadow: 0 1px 4px rgba(255, 87, 34, 0.2);
  }

  .dark-mode .spicy-card {
    background: linear-gradient(145deg, #2c0a05, #5a1a0c);
    color: #ffddd2;
    box-shadow: 0 4px 12px rgba(255, 140, 66, 0.2);
  }

  .dark-mode .spicy-title {
    color: #ff9f68;
  }

  .dark-mode .spicy-subtitle {
    color: #ffcc99;
  }

  .dark-mode .spicy-number {
    color: #ff7043;
  }
</style>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
  function animateValue(id, start, end, duration) {
    const obj = document.getElementById(id);
    if (!obj) return;
    let startTimestamp = null;
    const step = (timestamp) => {
      if (!startTimestamp) startTimestamp = timestamp;
      const progress = Math.min((timestamp - startTimestamp) / duration, 1);
      obj.innerHTML = Math.floor(progress * (end - start) + start);
      if (progress < 1) window.requestAnimationFrame(step);
    };
    window.requestAnimationFrame(step);
  }

  animateValue("count-produk", 0, 3, 1000);
  animateValue("count-stok", 0, 47, 1200);
  animateValue("count-user", 0, 29, 800);

  const ctx = document.getElementById('salesChart');
  if (ctx) {
    new Chart(ctx, {
      type: 'bar',
      data: {
        labels: ['Basreng Chili Oil', 'Basreng Hot Lava', 'Basreng Balado'],
        datasets: [{
          label: 'Jumlah Terjual',
          data: [30, 19, 12],
          backgroundColor: [
            '#ff3c00',
            '#ff7043', 
            '#e65100'
          ],
          borderRadius: 8,
          borderWidth: 0
        }]
      },
      options: {
        responsive: true,
        plugins: {
          legend: { display: false }
        },
        scales: {
          x: {
            ticks: { color: '#ff7043', font: { weight: 'bold' } },
            grid: { display: false }
          },
          y: {
            ticks: { color: '#ff7043' },
            grid: { color: 'rgba(255,99,71,0.1)' },
            beginAtZero: true
          }
        }
      }
    });
  }
});
</script>
@endpush
