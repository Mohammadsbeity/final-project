@extends('layouts.app')

@section('template_title')
    {{ $productRate->name ?? "{{ __('Show') Product Rate" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Product Rate</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('product_rates.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Product Id:</strong>
                            {{ $productRate->product_id }}
                        </div>
                        <div class="form-group">
                            <strong>User Id:</strong>
                            {{ $productRate->user_id }}
                        </div>
                        <div class="form-group">
                            <strong>Rate Starts:</strong>
                            {{ $productRate->rate_starts }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
