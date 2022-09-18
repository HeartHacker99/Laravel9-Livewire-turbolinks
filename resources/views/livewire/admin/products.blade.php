<div>

    @section('title')
        Products
    @endsection
        @include('livewire.admin.addproducts')
        @include('livewire.admin.editproduct')
        @include('livewire.admin.deleteProduct')
        <?php  $increment = 1 ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Products</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
{{--                                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>--}}
{{--                                <li class="breadcrumb-item active">Products</li>  data-bs-toggle="modal" data-bs-target="#addProductModal" --}}
                                <button type="button" class="btn btn-primary" wire:click.prevent="openProductModel">
                                    Add New Product
                                </button>
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
                            <div class="card">
                                @if(session('message'))
                                    <div class="alert alert-success alert-dismissible d-flex align-items-center fade show">
                                        <i class="bi-check-circle-fill"></i>
                                        <strong class="mx-2">Success!</strong> {{session('message')}}
                                    </div>
                                @endif

                                @if(count($errors) > 0)
                                    <div class="alert alert-danger alert-dismissible d-flex align-items-center fade show">
                                        <ul>
                                            @foreach($errors->all() as $error)
                                                <li>{{$error}}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <div class="card-header">
                                    <h3 class="card-title">All Products</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th>Num.</th>
                                            <th>Picture</th>
                                            <th>Product Name</th>
                                            <th>Product Category</th>
                                            <th>Product Price</th>
                                            <th>Status</th>
                                            <th>Edit/Delete</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($products as $product)
                                            <tr>
                                                <td>{{$increment}}</td>
                                                <td>
{{--                                                    src="{{asset('storage/product_images/')}}/{{$product->product_image}}"--}}
                                                    <img src="{{$product->product_image}}" style="height : 50px; width : 50px" class="img-circle elevation-2" alt="User Image">
                                                </td>
                                                <td>{{$product->product_name}}</td>
                                                <td>{{$product->category->category_name}}</td>
                                                <td>{{$product->product_price}} $</td>
                                                <td>
                                                    @if($product->status == '1')
                                                        <a wire:click.prevent="status({{$product->id}}, 0)" class="btn btn-success">Active</a>
                                                    @elseif($product->status == '0')
                                                        <a wire:click.prevent="status({{$product->id}}, 1)" class="btn btn-warning">Deactive</a>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a wire:click.prevent="edit({{$product->id}})" class="btn btn-primary"><i class="nav-icon fas fa-edit"></i></a>
                                                    <a wire:click.prevent="deleteId({{$product->id}})" class="btn btn-danger" ><i class="nav-icon fas fa-trash"></i></a>
                                                </td>
                                                <?php $increment += 1 ?>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th>Num.</th>
                                            <th>Picture</th>
                                            <th>Product Name</th>
                                            <th>Product Category</th>
                                            <th>Product Price</th>
                                            <th>Status</th>
                                            <th>Edit/Delete</th>
                                        </tr>
                                        </tfoot>
                                    </table>
                                    {!! $products->links() !!}
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
        @push('deleteConfirmation')

            <!-- jQuery -->
            <!-- Bootstrap 4 -->
            <script>
                $(document).on("click", "#delete", function(e){
                    e.preventDefault();
                    var link = $(this).attr("href");
                    bootbox.confirm("Do you really want to delete this element ?", function(confirmed){
                        if (confirmed){
                            window.location.href = link;
                        };
                    });
                });
            </script>
            <!-- page script -->
        @endpush
</div>
