<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('product') }}
            {{ Form::select('product_id', $products, null, ['class' => 'form-select' . ($errors->has('product_id') ? ' is-invalid' : '')]) }}
            {!! $errors->first('product_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('user') }}
            {{ Form::text('user_id', $productSold->user_id, ['class' => 'form-control' . ($errors->has('user_id') ? ' is-invalid' : ''), 'placeholder' => 'User Id']) }}
            {!! $errors->first('user_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('final_price') }}
            {{ Form::text('final_price', $productSold->final_price, ['class' => 'form-control' . ($errors->has('final_price') ? ' is-invalid' : ''), 'placeholder' => 'Final Price']) }}
            {!! $errors->first('final_price', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('payment_method') }}
            {{ Form::text('payment_method', $productSold->payment_method, ['class' => 'form-control' . ($errors->has('payment_method') ? ' is-invalid' : ''), 'placeholder' => 'Payment Method']) }}
            {!! $errors->first('payment_method', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('purshase_date') }}
            {{ Form::text('purshase_date', $productSold->purshase_date, ['class' => 'form-control' . ($errors->has('purshase_date') ? ' is-invalid' : ''), 'placeholder' => 'Purshase Date']) }}
            {!! $errors->first('purshase_date', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>