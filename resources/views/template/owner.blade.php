<div class="user-panel mt-3 pb-3 mb-3 d-flex">
  <div class="image">
    <img src="{{ asset('img') }}/2.jpg" class="img-circle elevation-2" alt="User Image">
  </div>
  <div class="info">
    <a href="#" class="d-block">Owner</a>
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