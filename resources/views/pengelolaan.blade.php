@extends('layouts.app')

@section('title', 'Pengelolaan')

@section('content')
<div class="container mt-4 animate-fade">
    <div class="card shadow-sm border-0 rounded-4">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="fw-bold text-primary">Pengelolaan Produk</h2>
        <div class="text-muted small">
            Pengguna: <strong>{{ $username }}</strong>
        </div>
        </div>
        <div class="mb-4">
        <input type="text" id="search" class="form-control form-control-lg shadow-sm rounded-pill px-4"
                placeholder="🔍 Cari produk...">
        </div>

        <div class="table-responsive">
        <table class="table align-middle text-center">
            <thead class="table-primary">
            <tr>
                <th>#</th>
                <th>Nama Produk</th>
                <th>Stok</th>
                <th>Harga</th>
                <th>Aksi</th>
            </tr>
            </thead>
            <tbody id="dataTable">
            @foreach ($items as $item)
            <tr>
                <td>{{ $item['id'] }}</td>
                <td class="fw-semibold">{{ $item['nama'] }}</td>
                <td>{{ $item['stok'] }}</td>
                <td>Rp {{ number_format($item['harga'], 0, ',', '.') }}</td>
                <td>
                <button class="btn btn-sm btn-warning me-2 shadow-sm px-3"
                        onclick="editItem('{{ $item['nama'] }}')">Edit</button>
                <button class="btn btn-sm btn-danger shadow-sm px-3"
                        onclick="hapusItem('{{ $item['nama'] }}')">Hapus</button>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        </div>
    </div>
    </div>
</div>

<style>
    .animate-fade {
    opacity: 0;
    transform: translateY(20px);
    animation: fadeInUp 0.6s ease forwards;
    }

    @keyframes fadeInUp {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
    }

    .card {
    background: rgba(255, 240, 220, 0.92);
    border-radius: 15px;
    box-shadow: 0 4px 10px rgba(255, 100, 0, 0.2);
    color: #3a1f0b;
}


    .dark-mode .card {
    background: rgba(50, 30, 20, 0.95);
    color: #ffe6d5;
    box-shadow: 0 4px 10px rgba(255, 140, 60, 0.3);
}


    #search {
    border: 2px solid #e3f2fd;
    transition: all 0.3s ease;
    }

    #search:focus {
    border-color: #007bff;
    box-shadow: 0 0 10px rgba(0, 123, 255, 0.3);
    }

    table {
    border-radius: 10px;
    overflow: hidden;
    }

    thead th {
    background: linear-gradient(90deg, #007bff, #00c6ff);
    color: white;
    border: none;
    }

    tbody tr:nth-child(even) {
    background-color: rgba(255, 235, 210, 0.8);
    }

    tbody tr:hover {
    background-color: rgba(255, 210, 150, 0.9);
    }
    .dark-mode tbody tr:nth-child(even) {
    background-color: rgba(60, 35, 25, 0.8);
    }
    .dark-mode tbody tr:hover {
    background-color: rgba(80, 45, 35, 0.9);
    }

    .btn-warning {
    color: #000;
    font-weight: 600;
    }

    .btn-danger {
    font-weight: 600;
    }

    .btn-warning:hover, .btn-danger:hover {
    transform: scale(1.05);
    transition: all 0.2s ease;
    }
</style>

@push('scripts')
<script>
    const searchInput = document.getElementById('search');
    searchInput.addEventListener('keyup', function() {
    const filter = searchInput.value.toLowerCase();
    const rows = document.querySelectorAll('#dataTable tr');
    rows.forEach(row => {
        const nama = row.cells[1].textContent.toLowerCase();
        row.style.display = nama.includes(filter) ? '' : 'none';
    });
    });

    function hapusItem(nama) {
    alert('Data "' + nama + '" berhasil dihapus (simulasi).');
    }

    function editItem(nama) {
    alert('Edit data "' + nama + '" (simulasi).');
    }
</script>
@endpush
@endsection
