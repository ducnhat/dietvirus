@extends('_layout.admin')

@section('content')
    @include('admin.order.topbar')
    <div id="content" class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-heading">
                        <strong>{{ trans('contact.contact') }}</strong>
                    </div>
                    <div class="panel-body">
                        {!! Form::model($data, ['method' => 'PATCH', 'action' => ['Admin\ContactController@update', $data->id], 'class' => 'form-horizontal', 'files' => true]) !!}

                        @include('admin.contact.form')

                        {!! Form::Hidden('id', $data->id) !!}

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop