@extends('_layout.admin')

@section('content')
    @include('admin.order.topbar')
    <section id="content" class="table-layout animated fadeIn">
        <div class="tray tray-center p25 va-t posr">
            <div class="panel mb25 mt5">
                <div class="panel-heading">
                    Thông tin đơn hàng - <strong>#{{ $data->id }}</strong>
                </div>
                <div class="panel-body p20 pb10">
                    <div class="form-group">

                        {!! Form::Label('name', trans('order.customer_name')) !!}:
                        {!! Form::Label('name', $data->name) !!}

                    </div>

                    <div class="form-group">

                        {!! Form::Label('name', trans('order.customer_email')) !!}:
                        {!! Form::Label('name', $data->email) !!}

                    </div>

                    <div class="form-group">

                        {!! Form::Label('name', trans('order.customer_phone')) !!}:
                        {!! Form::Label('name', $data->phone) !!}

                    </div>

                    <div class="form-group">

                        {!! Form::Label('name', trans('order.customer_name')) !!}:
                        {!! Form::Label('name', $data->name) !!}

                    </div>

                    <div class="form-group">

                        <div class="col-md-2">
                            {!! Form::button('Hủy', ['class' => 'btn btn-default form-control', 'id' => 'cancel']) !!}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script>
        $(document).ready(function(){
            $("button#cancel").click(function(){
                window.location.href = "{{ action('User\OrderController@index') }}";
            });
        });
    </script>
@endsection