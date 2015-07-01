@extends('_layout.admin')

@section('content')
    @include('admin.warranty.topbar')
    <section id="content" class="table-layout animated fadeIn">
        <div class="tray tray-center p25 va-t posr">
            <div class="panel mb25 mt5">
                <div class="panel-heading">
                    Yêu cầu bảo hành - <strong>#{{ $data->id }}</strong>
                </div>
                <div class="panel-body p20 pb10">
                    {!! Form::model($data, ['method' => 'PATCH', 'action' => ['Admin\OrderController@update', $data->id], 'class' => 'form-horizontal', 'files' => true]) !!}

                    <div class="form-group">

                        {!! Form::Label('name', trans('key.name'), ['class' => 'col-lg-2 control-label']) !!}
                        <div class="col-lg-5">
                            {!! Form::Text('name', $data->name, ['class' => 'form-control', 'readonly']) !!}
                        </div>

                    </div>

                    <div class="form-group">

                        {!! Form::Label('email', trans('key.email'), ['class' => 'col-lg-2 control-label']) !!}
                        <div class="col-lg-5">
                            {!! Form::Text('email', $data->email, ['class' => 'form-control', 'readonly']) !!}
                        </div>

                    </div>

                    <div class="form-group">

                        {!! Form::Label('phone', trans('key.phone'), ['class' => 'col-lg-2 control-label']) !!}
                        <div class="col-lg-5">
                            {!! Form::Text('phone', $data->phone, ['class' => 'form-control', 'readonly']) !!}
                        </div>

                    </div>

                    <div class="form-group">

                        {!! Form::Label('key', trans('key.key'), ['class' => 'col-lg-2 control-label']) !!}
                        <div class="col-lg-5">
                            {!! Form::Text('key', $data->productKey->key, ['class' => 'form-control', 'readonly']) !!}
                        </div>

                    </div>

                    <div class="form-group">

                        {!! Form::Label('created_at', trans('key.created_at'), ['class' => 'col-lg-2 control-label']) !!}
                        <div class="col-lg-5">
                            {!! Form::Text('created_at', $data->created_at->format('H:i d/m/Y'), ['class' => 'form-control', 'readonly']) !!}
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
                            <span class="tm-tag tm-tag-warning">
                                <span>{{ (is_null($data->resolve_at)) ? trans('key.not_yet') : $data->resolve_at->format('H:i d/m/Y') }}</span>
                            </span>
                        </div>

                    </div>

                    @if(!is_null($data->resolve_at))
                        <div class="form-group">

                            {!! Form::Label('resolve', trans('key.resolve'), ['class' => 'col-lg-2 control-label']) !!}
                            <div class="col-lg-5">
                                <p class="form-control-static text-muted">
                                    {!! Form::Textarea('resolve', $data->resolve, ['class' => 'form-control', 'readonly', 'rows' => '3']) !!}
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

                    @endif

                    <div class="form-group">

                        <div class="col-md-2">
                            {!! Form::button('Hủy', ['class' => 'btn btn-default form-control']) !!}
                        </div>

                    </div>
                    {!! Form::Hidden('id', $data->id) !!}

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </section>
@stop