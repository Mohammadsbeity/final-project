@extends('layouts.app')

@section('template_title')
    {{ $product->name ?? "{{ __('Show') Product" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Product</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('products.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Category Id:</strong>
                            {{ $product->category_id }}
                        </div>
                        <div class="form-group">
                            <strong>User Id:</strong>
                            {{ $product->user_id }}
                        </div>
                        <div class="form-group">
                            <strong>Product Name:</strong>
                            {{ $product->product_name }}
                        </div>
                        <div class="form-group">
                            <strong>Product Price:</strong>
                            {{ $product->product_price }}
                        </div>
                        <div class="form-group">
                            <strong>Details:</strong>
                            {{ $product->details }}
                        </div>
                        <div class="form-group">
                            <strong>Is Sold:</strong>
                            {{ $product->is_sold }}
                        </div>
                        <div class="form-group">
                            <strong>Admin Approved:</strong>
                            {{ $product->admin_approved }}
                        </div>
                        <div class="form-group">
                            <strong>Approval Date:</strong>
                            {{ $product->approval_date }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
