<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('product') }}
            {{ Form::text('product_id', $productRate->product_id, ['class' => 'form-control' . ($errors->has('product_id') ? ' is-invalid' : ''), 'placeholder' => 'Product Id']) }}
            {!! $errors->first('product_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('user') }}
            {{ Form::text('user_id', $productRate->user_id, ['class' => 'form-control' . ($errors->has('user_id') ? ' is-invalid' : ''), 'placeholder' => 'User Id']) }}
            {!! $errors->first('user_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('rate_starts') }}
            {{ Form::text('rate_starts', $productRate->rate_starts, ['class' => 'form-control' . ($errors->has('rate_starts') ? ' is-invalid' : ''), 'placeholder' => 'Rate Starts']) }}
            {!! $errors->first('rate_starts', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>