<nav class="navbar navbar-expand-lg navbar-light bg-white">
  <div class="container">
    <a class="navbar-brand text-primary" href="/"><img src="/assets/images/logo/logo.png" alt="Logo" width="170"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav bg-white">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Program
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Coming soon</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Tentang Kami
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item <?= uri_string() == 'profile' ? 'active':'' ?>" href="/profile">Profile</a></li>
            <li><a class="dropdown-item <?= uri_string() == 'pengurus' ? 'active':'' ?>" href="/pengurus">Daftar Pengurus DKM</a></li>
            <li><a class="dropdown-item <?= uri_string() == 'kontak' ? 'active':'' ?>" href="/kontak">Kontak</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= uri_string() == 'sumbangan' ? 'active':'' ?>" href="/sumbangan">Sumbangan</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= uri_string() == 'galeri' ? 'active':'' ?>" href="/galeri">Galeri</a>
        </li>
      </ul>
    </div>
  </div>
</nav>