<style>
   
    .nav-item.active > .nav-link {
        background-color: #4e73df;
        color: white;
        font-weight: bold;
    }

  
    .nav-item.active > .nav-link::after {
        content: " 🔴"; 
        font-size: 14px;
        margin-left: 5px;
    }

  
    .collapse-item.active {
        font-weight: bold;
        color: #4e73df !important;
    }

    .collapse-item.active::after {
        content: " ⚡";
        font-size: 12px;
        margin-left: 5px;
    }
</style>

<div id="sidebar_color">
    <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar">
        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/') }}">
            <div class="sidebar-brand-icon">
                <i class="fas fa-store"></i>
            </div>
            <div class="sidebar-brand-text mx-3">{{ env('APP_NAME') }}</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Dashboard -->
        <li class="nav-item {{ request()->routeIs('admin.index') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.index') }}">
                <i class="fas fa-chart-line"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <hr class="sidebar-divider my-0">

        <!-- Reservations -->
        <li class="nav-item {{ request()->routeIs('admin.reservations') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.reservations') }}">
                <i class="fas fa-calendar-check"></i>
                <span>Reservations</span>
            </a>
        </li>

        <hr class="sidebar-divider my-0">

        <!-- Contacts -->
        <li class="nav-item {{ request()->routeIs('admin.contact') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.contact') }}">
                <i class="fas fa-envelope"></i>
                <span>Contacts</span>
            </a>
        </li>

        <hr class="sidebar-divider">

        <!-- Room Management -->
        <li class="nav-item {{ request()->routeIs('admin.room.*') ? 'active' : '' }}">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseroom"
               aria-expanded="{{ request()->routeIs('admin.room.*') ? 'true' : 'false' }}" aria-controls="collapseroom">
                <i class="fas fa-bed"></i>
                <span>Room</span>
            </a>
            <div id="collapseroom" class="collapse {{ request()->routeIs('admin.room.*') ? 'show' : '' }}"
                 data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Room Management:</h6>
                    <a class="collapse-item {{ request()->routeIs('admin.room.index') ? 'active' : '' }}" href="{{ route('admin.room.index') }}">All Rooms</a>
                    <a class="collapse-item {{ request()->routeIs('admin.room.create') ? 'active' : '' }}" href="{{ route('admin.room.create') }}">Add Room</a>
                </div>
            </div>
        </li>

        <hr class="sidebar-divider">

        <!-- Gallery Management -->
        <li class="nav-item {{ request()->routeIs('admin.gallery.*') ? 'active' : '' }}">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsegallery"
               aria-expanded="{{ request()->routeIs('admin.gallery.*') ? 'true' : 'false' }}" aria-controls="collapsegallery">
                <i class="fas fa-images"></i>
                <span>Gallery</span>
            </a>
            <div id="collapsegallery" class="collapse {{ request()->routeIs('admin.gallery.*') ? 'show' : '' }}"
                 data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Gallery Management:</h6>
                    <a class="collapse-item {{ request()->routeIs('admin.gallery.index') ? 'active' : '' }}" href="{{ route('admin.gallery.index') }}">All Galleries</a>
                    <a class="collapse-item {{ request()->routeIs('admin.gallery.create') ? 'active' : '' }}" href="{{ route('admin.gallery.create') }}">Add Gallery</a>
                </div>
            </div>
        </li>

        <hr class="sidebar-divider">

        <!-- Service Management -->
        <li class="nav-item {{ request()->routeIs('admin.service.*') ? 'active' : '' }}">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseservice"
               aria-expanded="{{ request()->routeIs('admin.service.*') ? 'true' : 'false' }}" aria-controls="collapseservice">
                <i class="fas fa-cogs"></i>
                <span>Service</span>
            </a>
            <div id="collapseservice" class="collapse {{ request()->routeIs('admin.service.*') ? 'show' : '' }}"
                 data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Service Management:</h6>
                    <a class="collapse-item {{ request()->routeIs('admin.service.index') ? 'active' : '' }}" href="{{ route('admin.service.index') }}">All Services</a>
                    <a class="collapse-item {{ request()->routeIs('admin.service.create') ? 'active' : '' }}" href="{{ route('admin.service.create') }}">Add Service</a>
                </div>
            </div>
        </li>

        <hr class="sidebar-divider">

        <!-- Blog Management -->
        <li class="nav-item {{ request()->routeIs('admin.blog.*') ? 'active' : '' }}">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseblog"
               aria-expanded="{{ request()->routeIs('admin.blog.*') ? 'true' : 'false' }}" aria-controls="collapseblog">
                <i class="fas fa-blog"></i>
                <span>Blog</span>
            </a>
            <div id="collapseblog" class="collapse {{ request()->routeIs('admin.blog.*') ? 'show' : '' }}"
                 data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Blog Management:</h6>
                    <a class="collapse-item {{ request()->routeIs('admin.blog.index') ? 'active' : '' }}" href="{{ route('admin.blog.index') }}">All Blogs</a>
                    <a class="collapse-item {{ request()->routeIs('admin.blog.create') ? 'active' : '' }}" href="{{ route('admin.blog.create') }}">Add Blog</a>
                </div>
            </div>
        </li>

        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>
    </ul>
</div>
