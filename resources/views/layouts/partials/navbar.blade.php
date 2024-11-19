<nav class="app-header navbar navbar-expand bg-body">
    <!--begin::Container-->
    <div class="container-fluid">
        <!--begin::Start Navbar Links-->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
                    <i class="bi bi-list"></i>
                </a>
            </li>
            <li class="nav-item d-none d-md-block">
                <a href="#" class="nav-link">Home</a>
            </li>
        </ul>
        <!--end::Start Navbar Links-->

        <!--begin::End Navbar Links-->
        <ul class="navbar-nav ms-auto">
            <!--begin::Navbar Search-->
            <li class="nav-item">
                <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                    <i class="bi bi-search"></i>
                </a>
            </li>
            <!--end::Navbar Search-->

            <!--begin::User Menu Dropdown-->
            <li class="nav-item dropdown user-menu">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                    <!-- Default User Image -->
                    <img src="{{ Auth::user()->profile_image ?? asset('adminlte/assets/img/user-default.jpg') }}"
                        class="user-image rounded-circle shadow" alt="User Image">
                    <span class="d-none d-md-inline">{{ Auth::user()->name ?? 'Guest User' }}</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                    <!--begin::User Image-->
                    <li class="user-header text-bg-primary">
                        <img src="{{ Auth::user()->profile_image ?? asset('adminlte/assets/img/user-default.jpg') }}"
                            class="rounded-circle shadow" alt="User Image">
                        <p>
                            {{ Auth::user()->name ?? 'Guest User' }} - {{ Auth::user()->role ?? 'Web Developer' }}
                            <small>Member since {{ Auth::user()->created_at->format('M. Y') ?? 'Unknown' }}</small>
                        </p>
                    </li>
                    <!--end::User Image-->

                    <!--begin::Menu Body-->
                    <li class="user-body">
                        <div class="row">
                            <div class="col-4 text-center">
                                <a href="#">Followers</a>
                            </div>
                            <div class="col-4 text-center">
                                <a href="#">Sales</a>
                            </div>
                            <div class="col-4 text-center">
                                <a href="#">Friends</a>
                            </div>
                        </div>
                    </li>
                    <!--end::Menu Body-->

                    <!--begin::Menu Footer-->
                    <li class="user-footer">
                        <a href="#" class="btn btn-default btn-flat">Profile</a>
                        <a href="{{ route('logout') }}" class="btn btn-default btn-flat float-end"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Sign Out
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                    <!--end::Menu Footer-->
                </ul>
            </li>
            <!--end::User Menu Dropdown-->
        </ul>
        <!--end::End Navbar Links-->
    </div>
    <!--end::Container-->
</nav>
