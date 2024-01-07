<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('text') }}
            {{ Form::textarea('text', $aboutU->text, ['class' => 'form-control ckeditor' . ($errors->has('text') ? ' is-invalid' : ''), 'placeholder' => 'Text']) }}
            {!! $errors->first('text', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('image') }}
            {{ Form::file('image', $aboutU->image, ['class' => 'form-control' . ($errors->has('image') ? ' is-invalid' : ''), 'placeholder' => 'Image']) }}
            {!! $errors->first('image', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>