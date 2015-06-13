@extends('_layout.admin')

@section('content')
    @include('admin.user.topbar')
    <section id="content" class="table-layout animated fadeIn">
        <div class="tray tray-center p25 va-t posr">
            <div class="panel mb25 mt5">
                <div class="panel-heading">
                    Tạo tài khoản
                </div>
                <div class="panel-body p20 pb10">
                    {!! Form::open(['method' => 'post', 'action' => ['Admin\UserController@store']]) !!}

                    @include('admin.user.form')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </section>
@stop