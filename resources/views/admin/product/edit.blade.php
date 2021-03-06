@extends('_layout.admin')

@section('content')
    @include('admin.user.topbar')
    <div id="content" class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-heading">
                        Thêm sản phẩm
                    </div>
                    <div class="panel-body">
                        {!! Form::model($data, ['method' => 'PATCH', 'action' => ['Admin\ProductController@update', $data->id], 'files' => true]) !!}

                        @include('admin.product.form')

                        {!! Form::Hidden('id', $data->id) !!}

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop