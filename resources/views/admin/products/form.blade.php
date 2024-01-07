<div class="box box-info padding-1">
    <div class="box-body">

        <input type="hidden" name="user_id" value="{{ Auth::id() }}" />
        <div class="form-group">
            {{ Form::label('category') }}
            {{ Form::select('category_id', $categories, null, ['class' => 'form-select' . ($errors->has('category_id') ? ' is-invalid' : ''), 'placeholder' => 'Category Id']) }}
            {!! $errors->first('category_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('product_name') }}
            {{ Form::text('product_name', $product->product_name, ['class' => 'form-control' . ($errors->has('product_name') ? ' is-invalid' : ''), 'placeholder' => 'Product Name']) }}
            {!! $errors->first('product_name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('product_price') }}
            {{ Form::text('product_price', $product->product_price, ['class' => 'form-control' . ($errors->has('product_price') ? ' is-invalid' : ''), 'placeholder' => 'Product Price']) }}
            {!! $errors->first('product_price', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('details') }}
            {{ Form::textarea('details', $product->details, ['class' => 'form-control ckeditor' . ($errors->has('details') ? ' is-invalid' : ''), 'placeholder' => 'Details']) }}
            {!! $errors->first('details', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        @if (Auth::user()->id == 1)
            <div class="form-check form-switch">
                <input class="form-check-input" {{ $product->is_sold == '1' ? 'checked' : '' }} type="checkbox"
                    id="itemSold">
                <label class="form-check-label" for="itemSold">Item Sold</label>
            </div>
            <div class="form-check form-switch">
                <input class="form-check-input" {{ $product->admin_approved == '1' ? 'checked' : '' }} type="checkbox"
                    id="adminApproved">
                <label class="form-check-label" for="adminApproved">Admin Approval</label>
            </div>
        @endif
        <div class="form-group">
            {{ Form::label('approval_date') }}
            {{ Form::date('approval_date', $product->approval_date, ['class' => 'form-control' . ($errors->has('approval_date') ? ' is-invalid' : ''), 'placeholder' => 'Approval Date']) }}
            {!! $errors->first('approval_date', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>
<style>
    span.select2.select2-container.select2-container--default.select2-container--focus,
    span.select2.select2-container.select2-container--default.select2-container--below,
    span.select2.select2-container.select2-container--default {
        width: 100% !important;
    }
</style>
