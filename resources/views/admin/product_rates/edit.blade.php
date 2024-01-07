@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Product Rate
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} Product Rate</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('product_rates.update', $productRate->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('admin.product_rates.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
