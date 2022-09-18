<div>

    <section class="h-100" style="background-color: #eee;">
        <div class="container h-100 py-5">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-10">

                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h3 class="fw-normal mb-0 text-black">Shopping Cart</h3>
{{--                        <div>--}}
{{--                            <p class="mb-0"><span class="text-muted">Sort by:</span> <a href="#!" class="text-body">price <i--}}
{{--                                        class="fas fa-angle-down mt-1"></i></a></p>--}}
{{--                        </div>--}}
                    </div>
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
                @foreach($cartitems as $item)
                        <div class="card rounded-3 mb-4">
                        <div class="card-body p-6">
                            <div class="row d-flex justify-content-between align-items-center">
                                <div class="col-md-2 col-lg-2 col-xl-2">
                                    <img src="storage/product_images/{{ $item->product->product_image }}" class="img-thumbnail" alt="No Image" />
                                </div>
                                <div class="col-md-3 col-lg-3 col-xl-3">
                                    <p class="lead fw-normal mb-2">{{ $item->product->product_name}}</p>
                                </div>
                                <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                                    <button class="btn btn-link px-2" wire:click.prevents="decrementQty({{ $item->id }})">
                                        <i class="fas fa-minus"></i>
                                    </button>

                                    <input id="form1" min="0" name="quantity" value="{{ $item->quantity}}" class="form-control form-control-sm" />

                                    <button class="btn btn-link px-2" wire:click.prevents="incrementQty({{$item->id}})" >
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                                <div class="col-md-1 col-lg-1 col-xl-2 ">
                                    <h5 class="mb-0"> {{ $item->product->product_price * $item->quantity }}$</h5>
                                </div>
                                <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                    <a wire:click="removeItem({{$item->id}})" class="text-danger"><i style="cursor: grab" class="fas fa-trash fa-lg"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <div class="card" style="margin-bottom: 1.2rem">
                        <div class="card-body">
                            <div style="margin: 0 2.4rem 0 2.4rem" class="row d-flex justify-content-between align-items-center">
                                <h3>Total Quantity: </h3>
                                <h3> {{ $this->total }}$</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <button type="button" wire:click="checkout" class="btn btn-warning btn-block btn-lg">Proceed to Pay</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
</div>
