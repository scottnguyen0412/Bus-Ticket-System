<!-- SIDEBAR -->
	<!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{url('/')}}">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-bus"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Bus<sup>Management</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <!-- Nav Item - Dashboard -->
            <li class="nav-item {{Request::routeIs('admin.dashboard') ? 'active':'';}}">
                <a class="nav-link" href="{{route('admin.dashboard')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item {{Request::routeIs('admin.account.index') ? 'active':'';}}">
                <a class="nav-link" href="{{route('admin.account.index')}}"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-user"></i>
                    <span>Account</span>
                </a>
            </li>
            <li class="nav-item {{Request::routeIs('admin.bus.index') ? 'active':'';}}">
                <a class="nav-link" href="{{route('admin.bus.index')}}">
                    <i class="fas fa-bus"></i>
                    <span>Bus</span>
                </a>
            </li>
			{{-- <li class="nav-item {{Request::routeIs('admin.schedule.index') ? 'active':'';}}">
                <a class="nav-link" href="{{route('admin.schedule.index')}}">
                    <i class="fas fa-route"></i>
                    <span>Route</span>
                </a>
            </li> --}}

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities1"
                    aria-expanded="true" aria-controls="collapseUtilities1">
                    <i class="fas fa-calendar"></i>
                    <span>Manage Schedule</span>
                </a>
                <div id="collapseUtilities1" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item text-primary {{Request::routeIs('admin.schedule.index') ? 'active':'';}}" href="{{route('admin.schedule.index')}}">
                            <i class="fas fa-route text-primary"></i>
                            <span>Route</span>
                        </a>
                        <a class="collapse-item text-primary {{Request::routeIs('admin.startdestination.index') ? 'active':'';}}" href="{{route('admin.startdestination.index')}}" href="{{route('admin.startdestination.index')}}">
                            <i class="fas fa-location-arrow"></i>
                            <span>Start Destination</span>
                        </a>
                        <a class="collapse-item text-primary " href="">
                            <i class="fas fa-map-marked"></i>
                            <span>Destination</span>
                        </a>
                    </div>
                </div>
            </li>
            
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Manage</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="utilities-color.html">Colors</a>
                        <a class="collapse-item" href="utilities-border.html">Borders</a>
                        <a class="collapse-item" href="utilities-animation.html">Animations</a>
                        <a class="collapse-item" href="utilities-other.html">Other</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Addons
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Pages</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Login Screens:</h6>
                        <a class="collapse-item" href="login.html">Login</a>
                        <a class="collapse-item" href="register.html">Register</a>
                        <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                        <div class="collapse-divider"></div>
                        <h6 class="collapse-header">Other Pages:</h6>
                        <a class="collapse-item" href="404.html">404 Page</a>
                        <a class="collapse-item" href="blank.html">Blank Page</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="charts.html">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Charts</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="tables.html">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Tables</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->
	<!-- SIDEBAR -->
