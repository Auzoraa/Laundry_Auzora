<div class="main-sidebar sidebar-light-primary elevation-4">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand" style="font-family: 'Kristen ITC', serif;color:white">
      <a href="/home">Zralaundry.</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="/home">Zra</a>
    </div>
    <ul class="sidebar-menu" style="color: white">
      @if(auth()->user()->role == 'admin')
      @include('template.admin')

      @elseif(auth()->user()->role == 'owner')
      @include('template.owner')
      
      @elseif(auth()->user()->role == 'kasir')
      @include('template.kasir')

      @endif
       
      </ul>
  </aside>
</div>