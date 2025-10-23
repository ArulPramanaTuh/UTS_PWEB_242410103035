<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'UTS PWEB')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

    <style>
* { font-family: 'Poppins', sans-serif; }

html, body {
    height: 100%;
    margin: 0;
}

body {
    display: flex;
    flex-direction: column;
    min-height: 100vh;
    margin: 0;
    color: #3a1f0b;
    background: linear-gradient(135deg, #ffddbaff, #f7b580ff);
    background-attachment: fixed;
    padding-top: 70px;
    transition: background 0.5s ease, color 0.3s ease;
}

main.container { flex: 1; }

body.dark-mode {
    background: linear-gradient(135deg, #571a06, #3c1f16);
    color: #ffe6d5;
}

nav.navbar {
    background: linear-gradient(90deg, #e1a715ff, #ffa600ff);
    backdrop-filter: blur(12px);
    position: fixed !important;
    top: 0;
    left: 0;
    width: 100%;
    z-index: 1050;
    border-bottom: 2px solid rgba(255, 255, 255, 0.2);
    transition: background 0.3s ease, box-shadow 0.3s ease;
}

.brand-title {
    color: #442200 !important;
    font-weight: 700;
    letter-spacing: 0.5px;
    transition: color 0.3s ease;
    text-shadow: 0 0 4px rgba(255, 255, 255, 0.4);
}

.dark-mode .brand-title {
    color: #ffb95e !important;
    text-shadow: 0 0 6px rgba(255, 100, 0, 0.6);
}
.brand-title:hover {
    color: #ffb74d !important;
    text-shadow: 0 0 8px rgba(255, 87, 34, 0.6);
}

.navbar .nav-link {
    color: #2b2b2b !important;
    font-weight: 500;
    transition: color 0.2s ease, transform 0.2s ease;
}

.navbar .nav-link:hover {
    color: #ff6f00 !important;
    transform: translateY(-2px);
}

.dark-mode nav.navbar {
    background: rgba(40, 20, 15, 0.9);
    border-bottom-color: rgba(255, 100, 50, 0.4);
    color: #ffffffff;
    box-shadow: 0 2px 6px rgba(0,0,0,0.4);
}

.dark-mode .navbar .nav-link { color: #ffc053ff !important; }
.dark-mode .navbar .nav-link:hover { color: #ffb74d !important; }

.card {
    border: none;
    border-radius: 15px;
    box-shadow: 0 3px 15px rgba(0,0,0,0.25);
    background: rgba(255, 245, 255, 0.92);
    color: #3a1f0b;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.card:hover {
    transform: translateY(-4px);
    box-shadow: 0 6px 18px rgba(255, 60, 0, 0.3);
}
.dark-mode .card {
    background: rgba(50, 30, 20, 0.95);
    color: #fff;
    box-shadow: 0 4px 12px rgba(255, 140, 66, 0.3);
}

button.btn-primary {
    background: linear-gradient(90deg, #ff6f3c, #ff3c00);
    border: none;
}

button.btn-primary:hover {
    transform: scale(1.05);
    box-shadow: 0 4px 15px rgba(255, 60, 0, 0.4);
    opacity: 0.95;
}

.text-muted { color: #5a3c2a !important; }
.dark-mode .text-muted { color: #fccf5b !important; }

footer {
    background: rgba(0, 0, 0, 0.3);
    padding: 1rem 0;
    border-top: 2px solid rgba(255, 255, 255, 0.3);
    text-align: center;
    font-size: 0.9rem;
    color: #3a1f0b;
}

.dark-mode footer {
    background: rgba(40, 20, 10, 0.8);
    border-top-color: rgba(255, 140, 66, 0.4);
    color: #ffb339;
}

#darkModeToggle {
    background: #ff3c00;
    border: none;
    font-size: 1.3rem;
    transition: all 0.3s ease;
}

#darkModeToggle:hover {
    transform: scale(1.1);
    background: #ff7043;
}

.shadow-nav {
    box-shadow: 0 4px 10px rgba(0,0,0,0.3);
}

body { padding-top: 80px !important; }

h4, h5, h6 {
    color: #4a1e00 !important;
}

.dark-mode h4,
.dark-mode h5,
.dark-mode h6 {
    color: #ffcc80 !important;
}
.text-theme th {
    color: #ff9800;
}

body.light-mode .text-theme td {
    color: #212529; 
}

body.dark-mode .text-theme td {
    color: #f8f9fa;
}
</style>

</head>

<body class="light-mode">
    {{-- Navbar hanya muncul setelah login --}}
    @if (!Request::is('login'))
        @include('components.navbar')
    @endif

    <main class="container my-4">
        @yield('content')
    </main>

    {{-- Footer hanya muncul di luar halaman login --}}
    @if (!Request::is('login'))
        @include('components.footer')
    @endif

    <button id="darkModeToggle"
        class="btn btn-dark position-fixed bottom-0 end-0 m-4 rounded-circle shadow"
        title="Ganti Mode"
        style="width:50px;height:50px;">
        🌓
    </button>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')

    <script>
    const toggle = document.getElementById('darkModeToggle');
    const body = document.body;
    const savedTheme = localStorage.getItem('theme') || 'light';
    body.className = savedTheme + '-mode';

    toggle.addEventListener('click', () => {
        const isDark = body.classList.contains('dark-mode');
        body.className = isDark ? 'light-mode' : 'dark-mode';
        localStorage.setItem('theme', isDark ? 'light' : 'dark');
    });

    window.addEventListener("scroll", function() {
        const navbar = document.querySelector("nav.navbar");
        if (window.scrollY > 10) {
            navbar.classList.add("shadow-nav");
        } else {
            navbar.classList.remove("shadow-nav");
        }
    });
    document.addEventListener('DOMContentLoaded', () => {
    if (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches) {
        document.body.classList.add('dark-mode');
    } else {
        document.body.classList.add('light-mode');
    }
    });
    </script>
</body>
</html>
