<div>
    @section('title')
        Shop
    @endsection
    <!-- start content -->

        <section id="home-section" class="hero">
            <div class="home-slider owl-carousel">
                @foreach($sliders as $slider)
                    <div class="slider-item" style="background-image: url(storage/slider_images/{{$slider->slider_image}})">
                        <div class="overlay"></div>
                        <div class="container">
                            <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">
                                <div class="col-md-12 text-center">
                                    <h1 class="mb-2">{{$slider->description1}}</h1>
                                    <h2 class="subheading mb-4">{{$slider->description2}}</h2>
                                    <p><a href="#" class="btn btn-primary">View Details</a></p>
                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </section>

        <section class="ftco-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-10 mb-5 text-center">
                        <ul class="product-category">
                            <li><a href="{{route('shop')}}" class="{{request()->is('shop') ? 'active' : ''}}" >All</a></li>
{{--                            wire:click.prevent="viewproduct({{$category->id}})"--}}
                            @foreach($categories as $category)
                                    <li><a href="" class="{{request()->is('viewproduct/'.$category->category_name) ? 'active' : ''}}">{{$category->category_name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="row">
                @foreach($products as $product)
                    <div class="col-md-6 col-lg-3 ">
                        <div class="product">
{{--                            src="{{asset('storage/product_images/'.$product->product_image)}}"--}}
                            <a class="img-prod"><img class="img-fluid" src="{{$product->product_image}}" alt="No Image">
{{--                                <span class="status">30%</span>--}}
                                <div class="overlay"></div>
                            </a>
                            <div class="text py-3 pb-4 px-3 text-center">
                                <h3><a href="#">{{$product->product_name}}</a></h3>
                                <div class="d-flex">
                                    <div class="pricing">
                                        {{-- <span class="mr-2 price-dc">PKR 120.00</span>--}}
                                        <p class="price"><span class="price-sale">{{$product->product_price}} $</span></p>
                                    </div>
                                </div>
                                <div class="bottom-area d-flex px-3">
                                    <div class="m-auto d-flex">
                                        <a href="#" class="add-to-cart d-flex justify-content-center align-items-center text-center">
                                            <span><i class="ion-ios-menu"></i></span>
                                        </a>
                                        <a wire:click.prevent="addToCart({{ $product->id }})" class="add-to-cart d-flex justify-content-center align-items-center text-center">
                                            <span><i class="ion-ios-cart"></i></span>
                                        </a>
                                        <a href="#" class="heart d-flex justify-content-center align-items-center ">
                                            <span><i class="ion-ios-heart"></i></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach



                </div>
                {{ $products->links('livewire.clientlayout.clientPagination') }}

            </div>
        </section>

        <section class="ftco-section ftco-no-pt ftco-no-pb py-5 bg-light">
            <div class="container py-4">
                <div class="row d-flex justify-content-center py-5">
                    <div class="col-md-6">
                        <h2 style="font-size: 22px;" class="mb-0">Subcribe to our Newsletter</h2>
                        <span>Get e-mail updates about our latest shops and special offers</span>
                    </div>
                    <div class="col-md-6 d-flex align-items-center">
                        <form action="#" class="subscribe-form">
                            <div class="form-group d-flex">
                                <input type="text" class="form-control" placeholder="Enter email address">
                                <input type="submit" value="Subscribe" class="submit px-3">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
</div>
