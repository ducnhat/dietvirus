@extends('_layout.admin')

@section('content')
    @include('admin.post-category.topbar')
    <div id="content" class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-heading">
                        {{ trans('post_category.create') }}
                    </div>
                    <div class="panel-body">
                        {!! Form::model($data, ['method' => 'PATCH', 'action' => ['Admin\PostCategoryController@update', $data->id], 'files' => true]) !!}

                        @include('admin.post-category.form')

                        {!! Form::Hidden('id', $data->id) !!}

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop