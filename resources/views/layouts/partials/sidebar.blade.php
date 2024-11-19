<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark"> <!--begin::Sidebar Brand-->
    <div class="sidebar-brand"> <!--begin::Brand Link--> <a href="./index.html" class="brand-link">
            <!--begin::Brand Image--> <img src="adminlte/assets/img/AdminLTELogo.png" alt="AdminLTE Logo"
                class="brand-image opacity-75 shadow"> <!--end::Brand Image--> <!--begin::Brand Text--> <span
                class="brand-text fw-light">AdminLTE 4</span> <!--end::Brand Text--> </a>
        <!--end::Brand Link-->
    </div> <!--end::Sidebar Brand--> <!--begin::Sidebar Wrapper-->
    <div class="sidebar-wrapper">
        <nav class="mt-2"> <!--begin::Sidebar Menu-->
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">

                <li class="nav-item"> <a href="" class="nav-link"> <i class="nav-icon bi-house-door"></i>
                        <p>Dashboard</p>
                    </a> </li>
                <li class="nav-item"> <a href="{{ route('map') }}" class="nav-link"> <i class="nav-icon bi bi-map"></i>
                        <p>Peta Dasar</p>
                    </a> </li>
                <li class="nav-item"> <a href="{{ route('markers.index') }}" class="nav-link"> <i
                            class="nav-icon bi bi-geo-alt"></i>
                        <p>Markers</p>
                    </a> </li>
                <li class="nav-item"> <a href="{{ route('routing') }}" class="nav-link"> <i
                            class="nav-icon bi bi-signpost"></i>
                        <p>Rute</p>
                    </a> </li>
                <br><br>

                <li class="nav-item">
                    <a href="{{ route('logout') }}" class="nav-link"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="nav-icon bi bi-box-arrow-right"></i>
                        <p>Sign Out</p>
                    </a>

                    <!-- Form Logout -->
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul> <!--end::Sidebar Menu-->
        </nav>
    </div> <!--end::Sidebar Wrapper-->
</aside> <!--end::Sidebar-->
