@if(!empty($errors->all()))
    <p class="bg-danger">
        @foreach($errors->all() as $error)
            {{ $error }} <br/>
        @endforeach
    </p>
@endif

<div class="form-group">

    {!! Form::Label('name', trans('order.customer_name'), ['class' => 'col-lg-2 control-label']) !!}
    <div class="col-lg-5">
        {!! Form::Text('name', $data->name, ['class' => 'form-control']) !!}
    </div>

</div>

<div class="form-group">

    {!! Form::Label('email', trans('order.customer_email'), ['class' => 'col-lg-2 control-label']) !!}
    <div class="col-lg-5">
        {!! Form::Text('email', $data->email, ['class' => 'form-control']) !!}
    </div>

</div>

<div class="form-group">

    {!! Form::Label('phone', trans('order.customer_phone'), ['class' => 'col-lg-2 control-label']) !!}
    <div class="col-lg-5">
        {!! Form::Text('phone', $data->phone, ['class' => 'form-control']) !!}
    </div>

</div>

<div class="form-group">

    {!! Form::Label('subtotal', trans('order.subtotal'), ['class' => 'col-lg-2 control-label']) !!}
    <div class="col-lg-5">
        <p class="form-control-static text-muted">
            <strong>{{ money_format($data->subtotal) }}</strong>
        </p>
    </div>

</div>

<div class="form-group">

    {!! Form::Label('coupon', trans('order.coupon'), ['class' => 'col-lg-2 control-label']) !!}
    <div class="col-lg-5">
        <p class="form-control-static text-muted">
            <strong>{{ $data->coupon }}</strong>
        </p>
    </div>

</div>

<div class="form-group">

    {!! Form::Label('discount', trans('order.discount'), ['class' => 'col-lg-2 control-label']) !!}
    <div class="col-lg-5">
        <p class="form-control-static text-muted">
            <strong>{{ money_format($data->discount) }}</strong>
        </p>
    </div>

</div>

<div class="form-group">

    {!! Form::Label('total', trans('order.total'), ['class' => 'col-lg-2 control-label']) !!}
    <div class="col-lg-5">
        <p class="form-control-static text-muted">
            <strong>{{ money_format($data->total) }}</strong>
        </p>
    </div>

</div>

<div class="form-group">

    {!! Form::Label('payment', trans('order.payment'), ['class' => 'col-lg-2 control-label']) !!}
    <div class="col-lg-5">
        <p class="form-control-static text-muted">
            <strong>{{ (!$data->is_paid) ? trans('order.not_yet') : $data->paid_at }}</strong>
        </p>
    </div>

</div>

<div class="form-group">

    <div class="col-lg-2">
        {!! Form::Submit('Lưu lại', ['class' => 'btn btn-primary form-control']) !!}
    </div>

    <div class="col-lg-2">
        {!! Form::button('Hủy', ['class' => 'btn btn-default form-control']) !!}
    </div>

</div>