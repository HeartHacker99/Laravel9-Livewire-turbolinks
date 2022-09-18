<div>
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="https://cdn-media-2.freecodecamp.org/w1280/5f9c9c8c740569d1a4ca32d2.jpg" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">{{auth()->user()->name}}</a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    <li class="nav-item has-treeview {{request()->is('admin') ? 'menu-open' : ''}}">
                        <a href="#" class="nav-link active">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('dashboard')}}" class="nav-link {{request()->is('admin') ? 'active' : ''}}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Dashboard v1</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item has-treeview {{request()->is('addcategory') ? 'menu-open' : ''}} {{request()->is('category') ? 'menu-open' : ''}}">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-folder"></i>
                            <p>
                                Categories
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
{{--                        <ul class="nav nav-treeview">--}}
{{--                            <li class="nav-item">--}}
{{--                                <a href="{{route('addcategory')}}" class="nav-link {{request()->is('addcategory') ? 'active' : ''}}">--}}
{{--                                    <i class="far fa-file nav-icon"></i>--}}
{{--                                    <p>Add category</p>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('category')}}" class="nav-link {{request()->is('category') ? 'active' : ''}}">
                                    <i class="far fa-file nav-icon"></i>
                                    <p>Categories</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item has-treeview {{request()->is('sliders') ? 'menu-open' : ''}} {{request()->is('addsliders') ? 'menu-open' : ''}} ">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-folder"></i>
                            <p>
                                Sliders
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview ">
                            <li class="nav-item">
                                <a href="{{route('addsliders')}}" class="nav-link  {{request()->is('addsliders') ? 'active' : ''}}">
                                    <i class="far fa-file nav-icon"></i>
                                    <p>Add slider</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('sliders')}}" class="nav-link  {{request()->is('sliders') ? 'active' : ''}}">
                                    <i class="far fa-file nav-icon"></i>
                                    <p>Sliders</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item has-treeview {{request()->is('products') ? 'menu-open' : ''}} {{request()->is('addproducts') ? 'menu-open' : ''}}">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-folder"></i>
                            <p>
                                Products
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>


{{--                        <ul class="nav nav-treeview">--}}
{{--                            <li class="nav-item">--}}
{{--                                <a href="{{route('addproducts')}}" class="nav-link {{request()->is('addproducts') ? 'active' : ''}}">--}}
{{--                                    <i class="far fa-file nav-icon"></i>--}}
{{--                                    <p>Add product</p>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('products')}}" class="nav-link {{request()->is('products') ? 'active' : ''}}">
                                    <i class="far fa-file nav-icon"></i>
                                    <p>Products</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item has-treeview {{request()->is('orders') ? 'menu-open' : ''}}">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-folder"></i>
                            <p>
                                Orders
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('orders')}}" class="nav-link {{request()->is('orders') ? 'active' : ''}}">
                                    <i class="far fa-file nav-icon"></i>
                                    <p>Orders</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu  -->
        </div>
        <!-- /.sidebar -->
    </aside>
    <!-- Sidebar End-->
</div>
