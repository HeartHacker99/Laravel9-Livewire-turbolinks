<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{asset('assets/admin/plugins/fontawesome-free/css/all.min.css')}}">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css')}}">
        <!-- Tempusdominus Bootstrap 4 -->
        <link rel="stylesheet" href="{{asset('assets/admin/dist/css/adminlte.min.css')}}">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap5-toggle@4.3.2/css/bootstrap5-toggle.min.css" rel="stylesheet">

        @livewireStyles
    </head>
    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">

            <!-- Navigation Start-->
            <!-- Navbar -->
            <livewire:adminlayout.navbar/>
            <!-- /.navbar -->

            <!-- Navigation End-->


            <!-- Sidebar Start-->
            <!-- Main Sidebar Container -->
            <livewire:adminlayout.sidebar/>

            <!-- Sidebar End-->


            {{--    Main Content Start--}}
                {{ $slot }}
            {{--    Main Content End--}}

            {{--    Footer Start--}}
            <livewire:adminlayout.footer/>
            {{--    Footer End--}}

            <!-- Page Content -->

        </div>
        <!-- jQuery -->
        <script src="{{asset('assets/admin/plugins/jquery/jquery.min.js')}}"></script>
        <!-- AdminLTE App -->
        <script src="{{asset('assets/admin/dist/js/adminlte.js')}}"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>

        @yield('formScript') {{-- sidebar scripts  --}}
        @stack('deleteConfirmation')
{{--        @stack('modals')--}}


        <script>
            // Start Add category Open and Close model
            window.addEventListener('openAddCategoryModel', event => {
                $("#addCategoryModal").modal('show');
            });
            window.addEventListener('closeAddCategoryModel', event => {
                $("#addCategoryModal").modal('hide');
            });
            // End Add category open Close model

            // Start slider Open and Close model
            window.addEventListener('openSliderModel', event => {
                $("#addSliderModal").modal('show');
            });
            window.addEventListener('closeSliderModel', event => {
                $("#addSliderModal").modal('hide');
            });
            // End Delete slider open Close model

            // Start Product Open and Close model
            window.addEventListener('openProductModel', event => {
                $("#addProductModal").modal('show');
            });
            window.addEventListener('closeProductModel', event => {
                $("#addProductModal").modal('hide');
            });
            window.addEventListener('openEditCategoryModel', event => {
                $("#editProductModal").modal('show');
            });
            window.addEventListener('closeEditCategoryModel', event => {
                $("#editProductModal").modal('hide');
            });
            window.addEventListener('openDeleteProductModel', event => {
                $("#deleteProductModal").modal('show');
            });
            window.addEventListener('closeDeleteProductModel', event => {
                $("#deleteProductModal").modal('hide');
            });
            // End Product open Close model

            // Start Edit category Open and Close model
            window.addEventListener('openEditCategoryModel', event => {
                $("#editCategoryModal").modal('show');
            });
            window.addEventListener('closeEditCategoryModel', event => {
                $("#editCategoryModal").modal('hide');
            });
            // End Edit category open Close model

            // Start Delete Category Open and Close model
            window.addEventListener('openDeleteCategoryModel', event => {
                $("#deleteCategoryModal").modal('show');
            });
            window.addEventListener('closeDeleteCategoryModel', event => {
                $("#deleteCategoryModal").modal('hide');
            });
            // End Delete Cateogory open Close model
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap5-toggle@4.3.2/js/bootstrap5-toggle.min.js"></script> {{-- sidebar scripts  --}}
        <script src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.4/dist/livewire-turbolinks.js" data-turbolinks-eval="false" data-turbo-eval="false"></script>
        @livewireScripts
    </body>
</html>

