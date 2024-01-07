@extends('layouts.app')

@section('template_title')
    {{ $aboutU->name ?? "{{ __('Show') About U" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} About U</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('about_us.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Text:</strong>
                            {{ $aboutU->text }}
                        </div>
                        <div class="form-group">
                            <strong>Image:</strong>
                            {{ $aboutU->image }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
