
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Slider</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Slider</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
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
                    <!-- jquery validation -->
                    <div class="card card-warning">
                        <div class="card-header">
                            <h3 class="card-title">Edit slider</h3>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="form-group">
                                    <label for="description1">Slider Description 1</label>
                                    <input type="text" id="description1" name="description1" class="form-control" wire:model.defer="description1">
                                </div>
                                <div class="form-group">
                                    <label for="description2">Slider Description 2</label>
                                    <input type="text" id="description2" name="description2" class="form-control" wire:model.defer="description2">
                                </div>
                                <div class="form-group">
                                    <label for="sliderImage">Slider Image</label>
                                    <input class="form-control" type="file" id="sliderImage" name="sliderImage" wire:model.defer="sliderImage">
                                    {{--                                @if ($sliderImage)--}}
                                    {{--                                    Photo Preview:--}}
                                    {{--                                    <img src="{{ $sliderImage->temporaryUrl() }}">--}}
                                    {{--                                @endif--}}
                                </div>
                                <input type="hidden" name="id" wire:model="ids">


                            </form>

                        </div>
                        <div class="form-group">
                            <button type="button"  class="btn btn-primary" wire:click.prevent="updateSlider">Edit Slider</button>
                        </div>
                        <!-- /.card-header -->
                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (left) -->
                <!-- right column -->
                <div class="col-md-6">

                </div>
                <!--/.col (right) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

