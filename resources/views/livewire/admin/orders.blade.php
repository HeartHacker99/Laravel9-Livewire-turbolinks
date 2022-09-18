<div>

    @section('title')
        Orders
    @endsection
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Ordes</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item active">Ordes</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
            @if(session('message'))
                <div class="alert alert-success alert-dismissible d-flex align-items-center fade show">
                    <i class="bi-check-circle-fill"></i>
                    <strong class="mx-2">Success!</strong> {{session('message')}}
                </div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger alert-dismissible d-flex align-items-center fade show">
                    <i class="bi-check-circle-fill"></i>
                    <strong class="mx-2">Error!</strong> {{session('error')}}
                </div>
            @endif
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">All Ordes</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Client Name</th>
                                        <th>Total Paid</th>
                                        <th>Orders</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($orders as $order)
                                        <tr>
                                            <td>{{$order->created_at->diffForHumans()}}</td>
                                            <td>{{$order->user->name}}</td>
                                            <td>{{$order->amount}}$</td>
                                            <td>
{{--                                                    @foreach($order->cart->items as $item)--}}
{{--                                                        {{$item['product_name']}}--}}
{{--                                                    @endforeach--}}
                                                {{$order->product->product_name}}
                                            </td>
                                            <td>

                                                <a href="{{url('viewPdf')}}/{{$order->id}}" class="btn btn-primary"><i class="nav-icon fas fa-eye"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>Date</th>
                                        <th>Client Names</th>
                                        <th>Orders</th>
                                        <th>Actions</th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

    @section('pagesScripts')
        <!-- DataTables -->
        <script src="{{asset('assets/admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('assets/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
        <script src="{{asset('assets/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
        <script src="{{asset('assets/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>

        <script>
            $(function () {
                $("#example1").DataTable({
                    "responsive": true,
                    "autoWidth": false,
                });
                $('#example2').DataTable({
                    "paging": true,
                    "lengthChange": false,
                    "searching": false,
                    "ordering": true,
                    "info": true,
                    "autoWidth": false,
                    "responsive": true,
                });
            });
        </script>
    @endsection

</div>
