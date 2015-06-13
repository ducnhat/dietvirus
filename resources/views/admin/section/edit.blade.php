@extends('_layout.admin')

@section('content')
    @include('admin.section.topbar')
    <div id="content" class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-heading">
                        Sửa danh mục
                    </div>
                    <div class="panel-body">
                        {!! Form::model($data, ['method' => 'PATCH', 'action' => ['Admin\SectionController@update', $data->id]]) !!}

                        @include('admin.section.form')

                        {!! Form::Hidden('id', $data->id) !!}

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop