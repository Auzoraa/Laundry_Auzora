<div class="user-panel mt-3 pb-3 mb-3 d-flex">
  <div class="image">
    <img src="{{ asset('img') }}/3.jpg" class="img-circle elevation-2" alt="Kasir Image">
  </div>
  <div class="info">
    <a href="#" class="d-block profil">Kasir</a>
  </div>
</div>
<li class="nav-item">
    <a href="{{ route('transaksi.index') }}" class="nav-link">
      <i class="bi bi-basket3-fill"></i>
      <p>
        Transaksi
      </p>
    </a>
  </li>  
  <li class="nav-item">
    <a href="{{ route('registrasi.index') }}" class="nav-link">
      <i class="bi bi-person-plus-fill"></i>
      <p>
        Registrasi
      </p>
    </a>
  </li>  
  <li class="nav-item">
    <a href="{{ route('laporan.index') }}" class="nav-link">
      <i class="bi bi-calendar-month-fill"></i>
      <p>
        Laporan
      </p>
    </a>
  </li>