<nav class="navbar navbar-expand-lg">
  <div class="container d-flex justify-content-between align-items-center">
    <a class="navbar-brand brand-title" href="{{ route('dashboard', request()->only('username')) }}">
      Basreng Basah Cak Arul 🌶️
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-end" id="nav">
      <ul class="navbar-nav">
        <li class="nav-item"><a class="nav-link" href="{{ route('dashboard', request()->only('username')) }}">Dashboard</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('pengelolaan', request()->only('username')) }}">Pengelolaan</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('profile', request()->only('username')) }}">Profile</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('login.form') }}">Logout</a></li>
      </ul>
    </div>
  </div>
</nav>
