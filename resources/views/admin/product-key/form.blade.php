@if(!empty($errors->all()))
    <p class="bg-danger">
        @foreach($errors->all() as $error)
            {{ $error }} <br/>
        @endforeach
    </p>
@endif

<div class="form-group">

    {!! Form::Label('name', trans('form.product_name')) !!}
    {!! Form::Text('name', null, ['class' => 'form-control']) !!}

</div>

<div class="form-group">

    {!! Form::Label('image', trans('form.image')) !!}
    {!! Form::File('image') !!}

</div>

<div class="form-group">

    {!! Form::Label('price', trans('form.price')) !!}
    {!! Form::Text('price', null, ['class' => 'form-control']) !!}

</div>

<div class="form-group">

    {!! Form::Label('manufacturer', trans('form.manufacturer')) !!}
    {!! Form::Text('manufacturer', null, ['class' => 'form-control']) !!}

</div>

<div class="form-group">

    <div class="col-md-3">
        {!! Form::Submit('Lưu lại', ['class' => 'btn btn-primary form-control']) !!}
    </div>

    <div class="col-md-2">
        {!! Form::button('Hủy', ['class' => 'btn btn-default form-control']) !!}
    </div>

</div>