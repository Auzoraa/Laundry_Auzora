<li class="menu-header">Starter</li>
<li class="nav-item dropdown">
  <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Layout</span></a>
  <ul class="dropdown-menu">
    <li><a class="nav-link {{ ($title === "Laporan") ? 'active' : '' }}" href="{{ route('laporan.index') }}">Laporan</a></li>
    <li><a class="nav-link {{ ($title === "Transaksi") ? 'active' : '' }}" href="{{ route('transaksi.index') }}">Transaksi</a></li>
    <li><a class="nav-link {{ ($title === "User") ? 'active' : '' }}" href="{{ route('user.index') }}">User Management</a></li>
  </ul>
</li>