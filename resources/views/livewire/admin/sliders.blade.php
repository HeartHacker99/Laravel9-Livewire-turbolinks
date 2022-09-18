<div>

    <?php  $increment = 1 ?>

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Sliders</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item active">Sliders</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>


        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
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
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">All Sliders</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Num.</th>
                                        <th>Picture</th>
                                        <th>Description one</th>
                                        <th>Description Two</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($sliders as $slider)
                                        <tr>
                                            <td>{{$increment}}</td>
                                            <td>
                                                <img src="{{asset('storage/slider_images/')}}/{{$slider->slider_image}}" style="height : 50px; width : 50px" class="img-circle elevation-2" alt="User Image">
                                            </td>
                                            <td>{{$slider->description1}}</td>
                                            <td>{{$slider->description2}}</td>
                                            <td>
                                                @livewire('admin.toggle-button', ['model' => $slider, 'field' => 'status'])
                                            </td>

                                            <td>
                                                <a href="{{url('editslider/')}}/{{$slider->id}}" class="btn btn-primary"><i class="nav-icon fas fa-edit"></i></a>
                                                <a wire:click.prevent="deleteId({{$slider->id}})" class="btn btn-danger" ><i class="nav-icon fas fa-trash"></i></a>
                                            </td>

                                                <?php  $increment += 1 ?>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>Num.</th>
                                        <th>Picture</th>
                                        <th>Description one</th>
                                        <th>Description Two</th>
                                        <th>Actions</th>
                                    </tr>
                                    </tfoot>
                                </table>
                                <div>
                                    {!! $sliders->links() !!}
                                </div>

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
    <!-- /.content-wrapper -->
</div>


