@extends('_layout.user')

@section('content')
{{--    @include('user.user.topbar')--}}
    <div id="content" class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-heading">
                        {{ trans('user\account.edit') }}
                    </div>
                    <div class="panel-body">
                        {!! Form::model($data, ['method' => 'PATCH', 'action' => ['User\UserController@update', $data->id], 'class' => 'form-horizontal']) !!}

                        @include('user.user.form')

                        {!! Form::Hidden('id', $data->id) !!}

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop