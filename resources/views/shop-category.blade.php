@extends('layouts.apps')

@section('content')
    <!-- Shop Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <!-- Shop Product Start -->
            <div class="col-lg-9 col-md-8">
                <div class="row pb-3">
                    @foreach($products as $product)
                    <div class="col-lg-4 col-md-6 col-sm-6 pb-1">
                        <div class="product-item bg-light mb-4">
                            <div class="product-img position-relative overflow-hidden">
                                <img class="img-fluid w-100" src="{{ asset('image/'.$product->product_images[0]->image) }}" alt="">
                                <div class="product-action">
                                    <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>
                                    <a class="btn btn-outline-dark btn-square" href="{{ route('detail', ['id' => $product->id ]) }}"><i class="fa fa-search"></i></a>
                                </div>
                            </div>
                            <div class="text-center py-4">
                                <a class="h6 text-decoration-none text-truncate" href="">{{ $product->product_name }}</a>
                                <div class="d-flex align-items-center justify-content-center mt-2">
                                    <h5>$ {{ $product->product_price }}</h5>
                                    <h6 class="text-muted ml-2"><del>$ {{ $product->product_price + $product->product_price*20/100 }}</del></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <div class="col-12">
                        {!! $products->links() !!}
                    </div>
                </div>
            </div>
            <!-- Shop Product End -->
        </div>
    </div>
    <!-- Shop End -->
@endsection
