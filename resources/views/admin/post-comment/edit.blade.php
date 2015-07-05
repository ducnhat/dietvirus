@extends('_layout.admin')

@section('content')
    @include('admin.post-comment.topbar')
    <div id="content" class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-heading">
                        {{ trans('post.comment') }} <strong>#{{ $data->id }}</strong>
                    </div>
                    <div class="panel-body">
                        {!! Form::model($data, ['method' => 'PATCH', 'action' => ['Admin\PostCommentController@update', $data->id], 'class' => 'form-horizontal', 'files' => true]) !!}

                        @include('admin.post-comment.form')

                        {!! Form::Hidden('id', $data->id) !!}

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop