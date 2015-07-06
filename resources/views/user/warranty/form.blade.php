@if(!empty($errors->all()))
    <p class="bg-danger">
        @foreach($errors->all() as $error)
            {{ $error }} <br/>
        @endforeach
    </p>
@endif

<div class="form-group">

    {!! Form::Label('name', trans('key.name'), ['class' => 'col-lg-2 control-label']) !!}
    <div class="col-lg-5">
        {!! Form::Label('name', $data->name, ['class' => 'form-control']) !!}
    </div>

</div>

<div class="form-group">

    {!! Form::Label('email', trans('key.email'), ['class' => 'col-lg-2 control-label']) !!}
    <div class="col-lg-5">
        {!! Form::Label('email', $data->email, ['class' => 'form-control']) !!}
    </div>

</div>

<div class="form-group">

    {!! Form::Label('phone', trans('key.phone'), ['class' => 'col-lg-2 control-label']) !!}
    <div class="col-lg-5">
        {!! Form::Label('phone', $data->phone, ['class' => 'form-control']) !!}
    </div>

</div>

<div class="form-group">

    {!! Form::Label('key', trans('key.key'), ['class' => 'col-lg-2 control-label']) !!}
    <div class="col-lg-5">
        {!! Form::Label('key', $data->productKey->key, ['class' => 'form-control']) !!}
    </div>

</div>

<div class="form-group">

    {!! Form::Label('created_at', trans('key.created_at'), ['class' => 'col-lg-2 control-label']) !!}
    <div class="col-lg-5">
        {!! Form::Label('created_at', $data->created_at->format('H:i d/m/Y'), ['class' => 'form-control']) !!}
    </div>

</div>

<div class="form-group">

    {!! Form::Label('error_message', trans('key.error_message'), ['class' => 'col-lg-2 control-label']) !!}
    <div class="col-lg-5">
        {!! Form::Textarea('error_message', $data->error_message, ['class' => 'form-control', 'readonly', 'rows' => '3']) !!}
    </div>

</div>

<div class="form-group">

    {!! Form::Label('resolve', trans('key.resolve'), ['class' => 'col-lg-2 control-label']) !!}
    <div class="col-lg-5">
        <span class="tm-tag tm-tag-{{ ($data->status) ? 'success' : 'warning' }}">
            <span>{{ (is_null($data->resolve_at)) ? trans('key.not_yet') : $data->resolve_at->format('H:i d/m/Y') }}</span>
        </span>
    </div>

</div>

<div class="form-group">

    {!! Form::Label('resolve', trans('key.is_warranted'), ['class' => 'col-lg-2 control-label']) !!}
    <div class="col-lg-5">
        <span class="tm-tag tm-tag-{{ ($data->is_warranted) ? 'info' : 'danger' }}">
            <span>{{ ($data->is_warranted) ? trans('key.yes') : trans('key.no') }}</span>
        </span>
    </div>

</div>

<div class="form-group">

    {!! Form::Label('resolve', trans('key.message'), ['class' => 'col-lg-2 control-label']) !!}
    <div class="col-lg-5">
        <p class="form-control-static text-muted">
            {!! Form::Textarea('resolve_text', $data->resolve, ['class' => 'form-control', 'readonly', 'rows' => '3']) !!}
        </p>
    </div>

</div>

<div class="form-group">

    {!! Form::Label('resolve_user', trans('key.resolve_user'), ['class' => 'col-lg-2 control-label']) !!}
    <div class="col-lg-5">
        <p class="form-control-static text-muted">
            <strong>{{ $data->user->name }}</strong>
        </p>
    </div>

</div>

<div class="form-group">

    <div class="col-lg-2">
        {!! Form::button('Hủy', ['class' => 'btn btn-default form-control', 'id' => 'go-back']) !!}
    </div>

</div>

@section('script')
    <script>
        $('button#go-back').click(function(){
            window.location.href="{{ action('User\WarrantyController@index') }}";
        });
    </script>
@endsection