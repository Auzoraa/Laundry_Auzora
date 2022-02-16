<div class="user-panel mt-3 pb-3 mb-3 d-flex">
  <div class="image">
    <img src="{{ asset('img') }}/1.jpg" class="img-circle elevation-2" alt="Admin Image">
  </div>
  <div class="info">
    <a href="#" class="d-block profil">Admin</a>
  </div>
</div>
<li class="nav-item has-treeview">
    <a href="#" class="nav-link">
      <i class="nav-icon fas fa-tachometer-alt"></i>
      <p>
        Data
        <i class="right fas fa-angle-left"></i>
      </p>
    </a>
    <ul class="nav nav-treeview">
      <li class="nav-item">
        <a href="{{ route('paket.index') }}" class="nav-link {{ ($title === "Paket") ? 'active' : '' }}">
          <i class="far fa-circle nav-icon"></i>
          <p>Paket</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('outlet.index') }}" class="nav-link {{ ($title === "Outlet") ? 'active' : '' }}">
          <i class="far fa-circle nav-icon"></i>
          <p>Outlet</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('member.index') }}" class="nav-link {{ ($title === "Member") ? 'active' : '' }}">
          <i class="far fa-circle nav-icon"></i>
          <p>Member</p>
        </a>
      </li>
    </ul>
  </li>
  <li class="nav-item">
    <a href="{{ route('laporan.index') }}" class="nav-link">
      <i class="bi bi-calendar-month-fill"></i>      
      <p>
        Laporan
      </p>
    </a>
  </li>
  <li class="nav-item">
    <a href="{{ route('transaksi.index') }}" class="nav-link">
      <i class="bi bi-basket3-fill"></i>
      <p>
        Transaksi
      </p>
    </a>
  </li>  <li class="nav-item">
    <a href="#" class="nav-link">
      <i class="bi bi-person-plus-fill"></i>      
      <p>
        Registrasi
      </p>
    </a>
  </li>
