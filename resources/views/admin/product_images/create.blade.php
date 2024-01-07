@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Product Image
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Create') }} Product Image</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('product_images.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('admin.product_images.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
