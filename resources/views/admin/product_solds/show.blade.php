@extends('layouts.app')

@section('template_title')
    {{ $productSold->name ?? "{{ __('Show') Product Sold" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Product Sold</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('product_solds.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Product Id:</strong>
                            {{ $productSold->product_id }}
                        </div>
                        <div class="form-group">
                            <strong>User Id:</strong>
                            {{ $productSold->user_id }}
                        </div>
                        <div class="form-group">
                            <strong>Final Price:</strong>
                            {{ $productSold->final_price }}
                        </div>
                        <div class="form-group">
                            <strong>Payment Method:</strong>
                            {{ $productSold->payment_method }}
                        </div>
                        <div class="form-group">
                            <strong>Purshase Date:</strong>
                            {{ $productSold->purshase_date }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
