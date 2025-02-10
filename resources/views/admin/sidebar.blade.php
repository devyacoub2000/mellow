<div id="sidebar_color">
    <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar">
        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{url('/')}}">
            <div class="sidebar-brand-icon">
                <i class="fas fa-store"></i>
            </div>
            <div class="sidebar-brand-text mx-3">{{ env('APP_NAME') }}</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Dashboard -->
        <li class="nav-item">
            <a class="nav-link" href="{{route('admin.index')}}">
                <i class="fas fa-chart-line"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <hr class="sidebar-divider">

        <!-- Room Management -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseroom"
               aria-expanded="true" aria-controls="collapseroom">
                <i class="fas fa-bed"></i>
                <span>Room</span>
            </a>
            <div id="collapseroom" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Room Management:</h6>
                    <a class="collapse-item" href="{{route('admin.room.index')}}">All Rooms</a>
                    <a class="collapse-item" href="{{route('admin.room.create')}}">Add Room</a>
                </div>
            </div>
        </li>

        <hr class="sidebar-divider">

        <!-- Gallery Management -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsegallery"
               aria-expanded="true" aria-controls="collapsegallery">
                <i class="fas fa-images"></i>
                <span>Gallery</span>
            </a>
            <div id="collapsegallery" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Gallery Management:</h6>
                    <a class="collapse-item" href="{{route('admin.gallery.index')}}">All Galleries</a>
                    <a class="collapse-item" href="{{route('admin.gallery.create')}}">Add Gallery</a>
                </div>
            </div>
        </li>

        <hr class="sidebar-divider">

        <!-- Service Management -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseservice"
               aria-expanded="true" aria-controls="collapseservice">
                <i class="fas fa-cogs"></i>
                <span>Service</span>
            </a>
            <div id="collapseservice" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Service Management:</h6>
                    <a class="collapse-item" href="{{route('admin.service.index')}}">All Services</a>
                    <a class="collapse-item" href="{{route('admin.service.create')}}">Add Service</a>
                </div>
            </div>
        </li>

        <hr class="sidebar-divider">

        <!-- Blog Management -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseblog"
               aria-expanded="true" aria-controls="collapseblog">
                <i class="fas fa-blog"></i>
                <span>Blog</span>
            </a>
            <div id="collapseblog" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Blog Management:</h6>
                    <a class="collapse-item" href="{{route('admin.blog.index')}}">All Blogs</a>
                    <a class="collapse-item" href="{{route('admin.blog.create')}}">Add Blog</a>
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
