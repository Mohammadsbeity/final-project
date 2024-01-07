@extends('layouts.app')

@section('template_title')
    {{ $productImage->name ?? "{{ __('Show') Product Image" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Product Image</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('product_images.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Product Id:</strong>
                            {{ $productImage->product_id }}
                        </div>
                        <div class="form-group">
                            <strong>Image:</strong>
                            {{ $productImage->image }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
