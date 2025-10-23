@extends('layouts.app')

@section('title', 'Login - Si Basreng')

@section('content')
<div class="d-flex justify-content-center align-items-center" style="min-height: 80vh;">
  <div class="card shadow-lg p-4 border-0 animate-fade" style="max-width: 420px; width: 100%; border-radius: 15px;">
    <div class="card-body">
      <h2 class="text-center fw-bold mb-4 spicy-title">🔥Login🔥</h2>

      <form action="{{ route('login') }}" method="POST">
        @csrf
        <div class="mb-3">
          <label for="username" class="form-label fw-semibold">Username</label>
          <input type="text" class="form-control form-control-lg" id="username" name="username"
                  placeholder="Masukkan username" required>
        </div>

        <div class="mb-3">
          <label for="password" class="form-label fw-semibold">Password</label>
          <input type="password" class="form-control form-control-lg" id="password" name="password"
                  placeholder="Masukkan password" required>
        </div>

        <button type="submit" class="btn btn-spicy w-100 py-2 fw-semibold mt-2">Masuk</button>
      </form> 

      @if(session('error'))
        <div class="alert alert-danger text-center mt-3" role="alert">
          {{ session('error') }}
        </div>
      @endif
    </div>
  </div>
</div>

<style>
  /* 🌶️ Tema Pedas Basreng */
  body {
    background: linear-gradient(135deg, #ffecd2, #fcb69f);
    color: #331111;
    transition: all 0.5s ease;
  }

  .dark-mode body {
    background: linear-gradient(135deg, #2c0a05, #5c1a0b, #8b250f);
    color: #fce8e6;
  }

  .spicy-title {
    color: #d62828;
    text-shadow: 0 2px 8px rgba(214, 40, 40, 0.2);
  }

  .animate-fade {
    opacity: 0;
    transform: translateY(20px);
    animation: fadeInUp 0.6s ease forwards;
  }

  @keyframes fadeInUp {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
  }

  .form-control {
    border: 2px solid #ffb347;
    border-radius: 10px;
    transition: all 0.3s ease;
  }

  .form-control:focus {
    border-color: #ff6f3c;
    box-shadow: 0 0 10px rgba(255, 111, 60, 0.5);
  }

  .btn-spicy {
    background: linear-gradient(90deg, #ff6f3c, #ff3c00);
    border: none;
    border-radius: 10px;
    color: white;
    font-size: 1.1rem;
    transition: all 0.3s ease;
  }

  .btn-spicy:hover {
    transform: scale(1.05);
    box-shadow: 0 4px 15px rgba(255, 60, 0, 0.5);
    background: linear-gradient(90deg, #ff3c00, #ffb347);
  }

  .card {
    backdrop-filter: blur(8px);
    background: rgba(255, 245, 240, 0.9);
    color: #331111;
  }

  .dark-mode .card {
    background: rgba(60, 20, 10, 0.9);
    color: #fff0e6;
  }

  .form-label {
    color: #7a2e00;
  }

  .dark-mode .form-label {
    color: #ffb199;
  }

  .dark-mode .form-control {
    background-color: #2c0a05;
    color: #ffe5dc;
    border: 1px solid #ff7043;
  }

  .dark-mode .form-control::placeholder {
    color: #ffccbc;
  }

  .dark-mode .btn-spicy {
    background: linear-gradient(90deg, #ff7043, #ff3d00);
  }

  .alert-danger {
    background-color: #ffefef;
    color: #c62828;
    border: 1px solid #ff6b6b;
  }

  .dark-mode .alert-danger {
    background-color: #3a0a0a;
    color: #ffb3b3;
    border-color: #ff6b6b;
  }
</style>
@endsection
