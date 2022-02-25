<div class="main-sidebar">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand" style="font-family: 'Kristen ITC', serif;">
      <a href="/home">Zralaundry.</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="index.html">St</a>
    </div>
    <ul class="sidebar-menu">
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