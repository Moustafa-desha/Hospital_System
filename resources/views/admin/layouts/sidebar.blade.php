<div class="page-wrap">
    <div class="app-sidebar colored">
        <div class="sidebar-header">
            <a class="header-brand" href="index.html">
                <div class="logo-img">
                    <img src="{{asset('src/img/brand-white.svg')}}" class="header-brand-img" alt="lavalite">
                </div>
                <span class="text">Hospital</span>
            </a>
            <button type="button" class="nav-toggle"><i data-toggle="expanded" class="ik ik-toggle-right toggle-icon"></i></button>
            <button id="sidebarClose" class="nav-close"><i class="ik ik-x"></i></button>
        </div>

        <div class="sidebar-content">
            <div class="nav-container">
                <nav id="main-menu-navigation" class="navigation-main">
                    <div class="nav-lavel">Navigation</div>
                    <div class="nav-item active">
                        <a href="{{url('admin/dashboard')}}"><i class="ik ik-bar-chart-2"></i><span>Dashboard</span></a>
                    </div>
                    <div class="nav-item">
                        <a href="pages/navbar.html"><i class="ik ik-menu"></i><span>Navigation</span> <span class="badge badge-success">New</span></a>
                    </div>
                    <div class="nav-item has-sub">
                        <a href="javascript:void(0)"><i class="ik ik-layers"></i><span>Widgets</span> <span class="badge badge-danger">150+</span></a>
                        <div class="submenu-content">
                            <a href="pages/widgets.html" class="menu-item">Basic</a>
                            <a href="pages/widget-statistic.html" class="menu-item">Statistic</a>
                            <a href="pages/widget-data.html" class="menu-item">Data</a>
                            <a href="pages/widget-chart.html" class="menu-item">Chart Widget</a>
                        </div>
                    </div>
                    <div class="nav-lavel">Doctors & Booking table</div>
                    <div class="nav-item has-sub">
                        <a href="#"><i class="ik ik-box"></i><span>Doctors</span></a>
                        <div class="submenu-content">
                            <a href="{{route('admin.index.doctor')}}" class="menu-item">All Doctors</a>
                            <a href="{{route('admin.create.doctor')}}" class="menu-item">Add New Doctor</a>
                            <a href="pages/ui/buttons.html" class="menu-item">Buttons</a>
                            <a href="pages/ui/navigation.html" class="menu-item">Navigation</a>
                        </div>
                    </div>
                    <div class="nav-item has-sub">
                        <a href="#"><i class="ik ik-gitlab"></i><span>Appointment</span> <span class="badge badge-success">New</span></a>
                        <div class="submenu-content">
                            <a href="{{ route('admin.appoint.index')}}" class="menu-item">Appointment</a>
                            <a href="{{ route('admin.appoint.create')}}" class="menu-item">Create Appointment</a>

                        </div>
                    </div>
                    <div class="nav-item has-sub">
                        <a href="#"><i class="ik ik-package"></i><span>Booking Table</span></a>
                        <div class="submenu-content">
                            <a href="{{ route('admin.booking.doctor')}}" class="menu-item">Booking</a>
                        </div>
                    </div>
                    <div class="nav-item">
                        <a href="pages/ui/icons.html"><i class="ik ik-command"></i><span>Icons</span></a>
                    </div>


                    <div class="nav-lavel">Admins & Roles</div>

                    <div class="nav-item has-sub">
                        <a href="#"><i class="ik ik-lock"></i><span>Authentication</span></a>
                        <div class="submenu-content">
                            <a href="{{route('admin.role.index')}}" class="menu-item">All Roles</a>
                            <a href="pages/register.html" class="menu-item"></a>
                            <a href="pages/forgot-password.html" class="menu-item">Forgot Password</a>
                        </div>
                    </div>
                    <div class="nav-item has-sub">
                        <a href="#"><i class="ik ik-file-text"></i><span>Profile</span></a>
                        <div class="submenu-content">
                            <a href="pages/profile.html" class="menu-item">Profile</a>
                        </div>
                    </div>

                </nav>
            </div>
        </div>
    </div>
