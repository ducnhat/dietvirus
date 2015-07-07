@if(!empty($errors->all()))
    <p class="bg-danger">
        @foreach($errors->all() as $error)
            {{ $error }} <br/>
        @endforeach
    </p>
@endif

<div class="form-group">

    {!! Form::Label('name', trans('user\account.name'), ['class' => 'col-lg-2 control-label']) !!}
    <div class="col-lg-5">
        {!! Form::Label('name', $data->name, ['class' => 'control-label']) !!}
        {!! Form::Hidden('name', $data->name) !!}
    </div>
</div>

<div class="form-group">

    {!! Form::Label('email', trans('user\account.email'), ['class' => 'col-lg-2 control-label']) !!}
    <div class="col-lg-5">
        {!! Form::Label('email', $data->email, ['class' => 'control-label']) !!}
        {!! Form::Hidden('email', $data->email) !!}
    </div>
</div>

<div class="form-group">

    {!! Form::Label('ref_code', trans('user\account.ref_code'), ['class' => 'col-lg-2 control-label']) !!}
    <div class="col-lg-5">
        {!! Form::Label('ref_code', ($data->id + REF_CODE_FROM), ['class' => 'control-label']) !!}
    </div>
</div>

<div class="form-group">

    {!! Form::Label('phone', trans('user\account.phone'), ['class' => 'col-lg-2 control-label']) !!}
    <div class="col-lg-5">
        {!! Form::Text('phone', $data->phone, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group">

    {!! Form::Label('password', trans('user\account.password'), ['class' => 'col-lg-2 control-label']) !!}
    <div class="col-lg-5">
        {!! Form::Password('password', ['class' => 'form-control']) !!}
    </div>

</div>

<div class="form-group">

    {!! Form::Label('repassword', trans('user\account.repassword'), ['class' => 'col-lg-2 control-label']) !!}
    <div class="col-lg-5">
        {!! Form::Password('repassword', ['class' => 'form-control']) !!}
    </div>

</div>

<div class="form-group">

    <div class="col-md-3">
        {!! Form::Submit('Lưu lại', ['class' => 'btn btn-primary form-control']) !!}
    </div>

</div>