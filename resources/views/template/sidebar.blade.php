<aside class="main-sidebar sidebar-light-blue elevation-4">
    <!-- Brand Logo -->
    <a href="/home" class="brand-link">
      <img src="{{ asset('img') }}/laundry-machine.png"
           class="brand-image img-circle"
           style="opacity: .8; position:relative; right:10px">
      <span class="brand-text font-weight-light brand">Zralaundry.</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               @if(auth()->user()->role == 'admin')
               @include('template.admin')

               @elseif(auth()->user()->role == 'owner')
               @include('template.owner')
               
               @elseif(auth()->user()->role == 'kasir')
               @include('template.kasir')

               @endif
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>