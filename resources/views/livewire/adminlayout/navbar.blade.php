<div>
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{route('dashboard')}}" class="nav-link">Home</a>
            </li>

        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <form action="{{route('logout')}}" method="post">
                    @csrf
                    <a class="nav-link" style="cursor: pointer" data-slide="true" onclick="this.parentNode.submit();">Logout</a>
                </form>

            </li>
        </ul>
    </nav>
    <!-- /.navbar -->
</div>
