<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('product') }}
            {{ Form::select('product_id', $products, null, ['class' => 'form-select' . ($errors->has('product_id') ? ' is-invalid' : '')]) }}
            {!! $errors->first('product_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('image') }}
            {{ Form::file('image', $productImage->image, ['class' => 'form-control' . ($errors->has('image') ? ' is-invalid' : ''), 'placeholder' => 'Image']) }}
            {!! $errors->first('image', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>