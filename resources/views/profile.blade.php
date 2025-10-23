@extends('layouts.app')

@section('title', 'Profile')

@section('content')
<div class="row justify-content-center">
  <div class="col-md-6">
    <div class="card p-4 text-center">
      <img src="{{ asset('images/arul.jpg') }}" 
      alt="Foto Profil {{ $username }}" 
      class="rounded-circle mx-auto mb-3 shadow-sm" 
      width="120" height="120" 
      style="object-fit: cover;">


      <h3 class="fw-bold text-primary">{{ $profile['nama'] }}</h3>
      <p class="text-muted mb-4">{{'Mahasiswa Fakultas Ilmu Komputer'}}</p>

      <table class="table table-borderless text-start text-theme">
        <tr>
          <th style="width: 30%;">NIM</th>
          <td>{{ $profile['nim'] }}</td>
        </tr>
        <tr>
          <th>Email</th>
          <td>{{ $profile['email'] }}</td>
        </tr>
        <tr>
          <th>Program Studi</th>
          <td>{{ $profile['program'] }}</td>
        </tr>
      </table>
    </div>
  </div>
</div>
<style>
.card {
  background: rgba(255, 255, 255, 0.9);
  border-radius: 15px;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
}

.card table th {
  color: #b35400; 
}
.card table td {
  color: #2b2b2b;
}

.dark-mode .card {
  background: rgba(50, 30, 20, 0.95);
  color: #ffd8a8;
  box-shadow: 0 4px 15px rgba(255, 130, 40, 0.4);
}
.dark-mode .card table th {
  color: #ffb347; 
}
.dark-mode .card table td {
  color: #fff6e1;
}
.card {
  background: rgba(255, 255, 255, 0.9);
  border-radius: 15px;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
}

.card table {
  background-color: transparent !important;
}
.card table th,
.card table td {
  background-color: transparent !important;
}

.card table th {
  color: #b35400 !important;
}
.card table td {
  color: #2b2b2b !important;
}

/* MODE GELAP */
.dark-mode .card {
  background: rgba(50, 30, 20, 0.95);
  color: #ffd8a8;
  box-shadow: 0 4px 15px rgba(255, 130, 40, 0.4);
}

.dark-mode .card table {
  background-color: transparent !important;
}

.dark-mode .card table th,
.dark-mode .card table td {
  background-color: transparent !important;
}

.dark-mode .card table th {
  color: #ffb347 !important;
}

.dark-mode .card table td {
  color: #fff6e1 !important;
}
</style>

@endsection

