    <!-- Brand Logo -->
    <a href="/home" class="brand-link">
        <span class="brand-text font-weight-light" style="font-family: 'Kristen ITC', serif;">Zralaundry.</span>
    </a>
    <div class="sidebar">
        <!-- Add icons to the links using the .nav-icon class
         with font-awesome or any other icon font library -->
        @if (auth()->user()->role == 'admin')
            @include('template.admin')
        @elseif(auth()->user()->role == 'owner')
            @include('template.owner')
        @elseif(auth()->user()->role == 'kasir')
            @include('template.kasir')
        @endif
        </ul>
        </nav>
    </div>
