<!DOCTYPE html>
<html lang="en"> <!--begin::Head-->

@include('layouts.partials.head')

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary"> <!--begin::App Wrapper-->
    <div class="app-wrapper"> <!--begin::Header-->
        @include('layouts.partials.navbar')
        <!--begin::Sidebar-->

        @include('layouts.partials.sidebar')
        <!--begin::App Main-->
        <main class="app-main"> <!--begin::App Content Header-->
            @yield('content')
        </main> <!--end::App Main--> <!--begin::Footer-->

        @include('layouts.partials.footer')
    </div> <!--end::App Wrapper-->

    <!--begin::Script-->
    @include('layouts.partials.script')

</body><!--end::Body-->

</html>
