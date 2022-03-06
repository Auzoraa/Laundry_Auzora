<!-- Sidebar user (optional) -->
<div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('img') }}/1.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Admin</a>
        </div>
      </div>
<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
<li class="nav-header">Data</li>          
<li class="nav-item">
    <a href="{{ route('member.index') }}" class="nav-link {{ $title === 'Member' ? 'active' : '' }}">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>
            Member
        </p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('paket.index') }}" class="nav-link {{ $title === 'Paket' ? 'active' : '' }}">
        <i class="nav-icon fas fa-th"></i>
        <p>
            Paket
        </p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('outlet.index') }}" class="nav-link {{ $title === 'Outlet' ? 'active' : '' }}">
        <i class="nav-icon fas fa-copy"></i>
        <p>
            Outlet
        </p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('barangInv.index') }}" class="nav-link {{ $title === 'Barang Inventaris' ? 'active' : '' }}">
        <i class="nav-icon fas fa-chart-pie"></i>
        <p>
            Barang Inventaris
        </p>
    </a>
</li>
<li class="nav-header">Laporan</li>
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
    <a href="{{ route('user.index') }}" class="nav-link {{ $title === 'User Management' ? 'active' : '' }}">
        <i class="nav-icon fas fa-table"></i>
        <p>
            User Management
        </p>
    </a>
</li>
