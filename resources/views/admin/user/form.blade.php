@if(!empty($errors->all()))
    <p class="bg-danger">
        @foreach($errors->all() as $error)
            {{ $error }} <br/>
        @endforeach
    </p>
@endif

<div class="form-group">

    {!! Form::Label('name', trans('form.name')) !!}
    {!! Form::Text('name', null, ['class' => 'form-control']) !!}

</div>

<div class="form-group">

    {!! Form::Label('phone', trans('form.phone')) !!}
    {!! Form::Text('phone', null, ['class' => 'form-control']) !!}

</div>

<div class="form-group">

    {!! Form::Label('email', trans('form.email')) !!}
    {!! Form::Text('email', null, ['class' => 'form-control']) !!}

</div>

<div class="form-group">

    {!! Form::Label('password', trans('form.password')) !!}
    {!! Form::Password('password', ['class' => 'form-control']) !!}

</div>

<div class="form-group">

    {!! Form::Label('repassword', trans('form.repassword')) !!}
    {!! Form::Password('repassword', ['class' => 'form-control']) !!}

</div>

<div class="form-group">

    {!! Form::Label('status', trans('form.status')) !!}
    {!! Form::Select('status', array('1' => 'Kích hoạt', '0' => 'Khóa'), null, ['class' => 'form-control']) !!}

</div>

<div class="form-group">

    <div class="col-md-3">
        {!! Form::Submit('Lưu lại', ['class' => 'btn btn-primary form-control']) !!}
    </div>

    <div class="col-md-2">
        {!! Form::button('Hủy', ['class' => 'btn btn-default form-control']) !!}
    </div>

</div>