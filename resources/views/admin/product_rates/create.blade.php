@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Product Rate
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Create') }} Product Rate</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('product_rates.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('admin.product_rates.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
