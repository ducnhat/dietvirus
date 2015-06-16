@if(!empty($errors->all()))
    <p class="bg-danger">
        @foreach($errors->all() as $error)
            {{ $error }} <br/>
        @endforeach
    </p>
@endif

<div class="form-group">

    {!! Form::Label('key', trans('form.product_key')) !!}
    {!! Form::Text('key', null, ['class' => 'form-control']) !!}

</div>

<div class="form-group">

    {!! Form::Label('product_id', trans('form.product_name')) !!}
    {!! Form::Select('product_id', $products, null, ['class' => 'form-control']) !!}

</div>

<div class="form-group">

    <div class="col-md-3">
        {!! Form::hidden('user_id', $currentUser->id) !!}
        {!! Form::Submit('Lưu lại', ['class' => 'btn btn-primary form-control']) !!}
    </div>

    <div class="col-md-2">
        {!! Form::button('Hủy', ['class' => 'btn btn-default form-control']) !!}
    </div>

</div>