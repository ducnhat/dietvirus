@extends('_layout.admin')

@section('content')
    @include('admin.user.topbar')
    <section id="content" class="table-layout animated fadeIn">
        <div class="tray tray-center p25 va-t posr">
            <div class="panel mb25 mt5">
                <div class="panel-heading">
                    Thêm mã bản quyền
                </div>
                <div class="panel-body p20 pb10">
                    {!! Form::open(['method' => 'post', 'action' => ['Admin\ProductKeyController@store'], 'files' => true]) !!}

                    @include('admin.product-key.form')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </section>
@stop