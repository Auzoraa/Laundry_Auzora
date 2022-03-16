<div class="user-panel mt-3 pb-3 mb-3 d-flex">
    <div class="image">
        <img src="{{ asset('img') }}/3.jpg" class="img-circle elevation-2" alt="User Image">
    </div>
    <div class="info">
        <a href="#" class="d-block">Kasir</a>
    </div>
</div>
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-header">Data</li>
        <li class="nav-item">
            <a href="/laporan" class="nav-link {{ $title === 'Laporan' ? 'active' : '' }}">
                <i class="nav-icon fas fa-book"></i>
                <p>
                    Laporan
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="/transaksi" class="nav-link {{ $title === 'Transaksi' ? 'active' : '' }}">
                <i class="nav-icon fas fa-money-bill"></i>
                <p>
                    Transaksi
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('user.index') }}"
                class="nav-link {{ $title === 'User Management' ? 'active' : '' }}">
                <i class="nav-icon fas fa-user-check"></i>
                <p>
                    User Management
                </p>
            </a>
        </li>