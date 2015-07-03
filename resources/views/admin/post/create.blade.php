@extends('_layout.admin')

@section('content')
    @include('admin.post.topbar')
    <section id="content" class="table-layout animated fadeIn">
        <div class="tray tray-center p25 va-t posr">
            <div class="panel mb25 mt5">
                <div class="panel-heading">
                    {{ trans('post.create') }}
                </div>
                <div class="panel-body p20 pb10">
                    {!! Form::open(['method' => 'post', 'action' => ['Admin\PostController@store'], 'files' => true]) !!}

                    @include('admin.post.form')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </section>
@stop