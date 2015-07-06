@extends('_layout.user')

@section('content')
    <div id="content" class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-heading">
                        {{ trans('key.warranty') }} <strong>#{{ $data->id }}</strong>
                    </div>
                    <div class="panel-body">
                        {!! Form::model($data, ['method' => 'PATCH', 'action' => ['User\WarrantyController@update', $data->id], 'class' => 'form-horizontal', 'files' => true]) !!}

                        @include('user.warranty.form')

                        {!! Form::Hidden('id', $data->id) !!}

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop