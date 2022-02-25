<li class="menu-header">Data</li>
    <li class="{{ ($title === "Member") ? 'active' : '' }}"><a class="nav-link" href="{{ route('member.index') }}">Member</a></li>
    <li class="{{ ($title === "Paket") ? 'active' : '' }}"><a class="nav-link" href="{{ route('paket.index') }}">Paket</a></li>
    <li class="{{ ($title === "Barang Inventaris") ? 'active' : '' }}"><a class="nav-link" href="{{ route('barangInv.index') }}">Barang Inventaris</a></li>
    <li class="{{ ($title === "Outlet") ? 'active' : '' }}"><a class="nav-link" href="{{ route('outlet.index') }}">Outlet</a></li>
<li class="menu-header">Laporan</li>
    <li class="{{ ($title === "Laporan") ? 'active' : '' }}"><a class="nav-link" href="{{ route('laporan.index') }}">Laporan</a></li>
    <li class="{{ ($title === "Transaksi") ? 'active' : '' }}"><a class="nav-link" href="{{ route('transaksi.index') }}">Transaksi</a></li>
    <li class="{{ ($title === "User Management") ? 'active' : '' }}"><a class="nav-link" href="#">User Management</a></li>