<div>

    @section('title')
        Category
    @endsection

        <?php  $increment = 1 ?>
        @include('livewire.admin.addcategory')
        @include('livewire.admin.editcategory')
        @include('livewire.admin.deletecategory')

        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Categories</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                                <li class="breadcrumb-item active">Categories</li>
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
                            <h3>
                                Add New Category
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary"  wire:click.self="openaddcategory">
                                    Add New Category
                                </button>

                            </h3>
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
                                    <h3 class="card-title">All categories</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th>Num.</th>
                                            <th>Category Name</th>
                                            <th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($categories as $category)
                                            <tr>
                                                <td>{{$increment}}</td>
                                                <td>
                                                    {{$category->category_name}}
                                                </td>
                                                <td>
                                                    <a wire:click.prevent="edit({{$category->id}})" class="btn btn-primary"><i class="nav-icon fas fa-edit"></i></a>
                                                    <a wire:click.prevent="deleteId({{$category->id}})" class="btn btn-danger" ><i class="nav-icon fas fa-trash"></i></a>
                                                </td>
                                            </tr>
                                                <?php  $increment += 1 ?>
                                        @endforeach
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th>Num.</th>
                                            <th>Category Name</th>
                                            <th>Actions</th>
                                        </tr>
                                        </tfoot>
                                    </table>
                                    <div>
                                        {!! $categories->links() !!}
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
