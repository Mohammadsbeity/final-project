<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('category_name') }}
            {{ Form::text('category_name', $category->category_name, ['class' => 'form-control' . ($errors->has('category_name') ? ' is-invalid' : ''), 'placeholder' => 'Category Name']) }}
            {!! $errors->first('category_name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('category_icon') }}
            {{ Form::file('category_icon', $category->category_icon, ['class' => 'form-control' . ($errors->has('category_icon') ? ' is-invalid' : ''), 'placeholder' => 'Category Icon']) }}
            {!! $errors->first('category_icon', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>