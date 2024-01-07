@extends('layouts.app')

@section('template_title')
    {{ $productComment->name ?? "{{ __('Show') Product Comment" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Product Comment</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('product_commentss.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Product Id:</strong>
                            {{ $productComment->product_id }}
                        </div>
                        <div class="form-group">
                            <strong>User Id:</strong>
                            {{ $productComment->user_id }}
                        </div>
                        <div class="form-group">
                            <strong>Comment:</strong>
                            {{ $productComment->comment }}
                        </div>
                        <div class="form-group">
                            <strong>Is Reply:</strong>
                            {{ $productComment->is_reply }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
