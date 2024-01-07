<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('product') }}
            {{ Form::select('product_id', $products, null, ['class' => 'form-select' . ($errors->has('product_id') ? ' is-invalid' : '')]) }}
            {!! $errors->first('product_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('user') }}
            {{ Form::text('user_id', $productComment->user_id, ['class' => 'form-control' . ($errors->has('user_id') ? ' is-invalid' : ''), 'placeholder' => 'User Id']) }}
            {!! $errors->first('user_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('comment') }}
            {{ Form::text('comment', $productComment->comment, ['class' => 'form-control' . ($errors->has('comment') ? ' is-invalid' : ''), 'placeholder' => 'Comment']) }}
            {!! $errors->first('comment', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('is_reply') }}
            {{ Form::text('is_reply', $productComment->is_reply, ['class' => 'form-control' . ($errors->has('is_reply') ? ' is-invalid' : ''), 'placeholder' => 'Is Reply']) }}
            {!! $errors->first('is_reply', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>