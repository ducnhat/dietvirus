@extends('_layout.admin')

@section('content')
    @include('admin.plan.topbar')
    <div id="content" class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-heading">
                        Tạo gói
                    </div>
                    <div class="panel-body">
                        {!! Form::model($data, ['method' => 'PATCH', 'action' => ['Admin\PlanController@update', $data->id]]) !!}

                        @include('admin.plan.form')

                        {!! Form::Hidden('id', $data->id) !!}

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop