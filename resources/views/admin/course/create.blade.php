@extends('_layout.admin')

@section('content')
@include('admin.course.topbar')
    <section id="content" class="table-layout animated fadeIn">
        <div class="tray tray-center p25 va-t posr">
            <div class="panel mb25 mt5">
                <div class="panel-heading">
                    Tạo khóa học
                </div>
                <div class="panel-body p20 pb10">
                    {!! Form::open(['url' => 'admin-ant/course']) !!}

                    @include('admin.course.form')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </section>
@stop