<div class="user-panel mt-3 pb-3 mb-3 d-flex">
  <div class="image">
    <img src="{{ asset('img') }}/3.jpg" class="img-circle elevation-2" alt="User Image">
  </div>
  <div class="info">
    <a href="#" class="d-block">Kasir</a>
  </div>
</div>
<li class="nav-header">Data</li>
<li class="nav-item">
    <a href="{{ route('laporan.index') }}" class="nav-link {{ $title === 'Laporan' ? 'active' : '' }}">
        <i class="nav-icon fas fa-tree"></i>
        <p>
            Laporan
        </p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('transaksi.index') }}" class="nav-link {{ $title === 'Transaksi' ? 'active' : '' }}">
        <i class="nav-icon fas fa-edit"></i>
        <p>
            Transaksi
        </p>
    </a>
</li>
<li class="nav-item">
    <a href="#" class="nav-link {{ $title === 'User Management' ? 'active' : '' }}">
        <i class="nav-icon fas fa-table"></i>
        <p>
            User Management
        </p>
    </a>
</li>