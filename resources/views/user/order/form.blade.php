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
        <p class="form-control-static text-muted">
            <strong>{{ $data->name }}</strong>
        </p>
    </div>

</div>

<div class="form-group">

    {!! Form::Label('email', trans('order.customer_email'), ['class' => 'col-lg-2 control-label']) !!}
    <div class="col-lg-5">
        <p class="form-control-static text-muted">
            <strong>{{ $data->email }}</strong>
        </p>
    </div>

</div>

<div class="form-group">

    {!! Form::Label('phone', trans('order.customer_phone'), ['class' => 'col-lg-2 control-label']) !!}
    <div class="col-lg-5">
        <p class="form-control-static text-muted">
            <strong>{{ phone_format($data->phone) }}</strong>
        </p>
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
            <strong>{{ (is_null($data->paid_at)) ? trans('order.not_yet') : $data->paid_at->format('H:i d/m/Y') }}</strong>
        </p>
    </div>

</div>

<div class="form-group">

    {!! Form::Label('sent_key', trans('order.sent_key'), ['class' => 'col-lg-2 control-label']) !!}
    <div class="col-lg-5">
        <p class="form-control-static text-muted">
            <strong>{{ (is_null($data->sent_at)) ? trans('order.not_yet') : $data->sent_at->format('H:i d/m/Y') }}</strong>
        </p>
    </div>

</div>

<div class="form-group">

    <div class="col-lg-2">
        {!! Form::button(trans('form.go_back'), ['class' => 'btn btn-default form-control', 'id' => 'go-back']) !!}
    </div>

</div>

@section('script')
    <script>
        $('button#go-back').click(function(){
            window.location.href="{{ action('User\OrderController@index') }}";
        });
    </script>
@endsection