@extends('_layout.user')

@section('content')
    @include('user.order.topbar')
    <div id="content" class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-heading">
                        {{ trans('order.order_detail') }} <strong>#{{ $data->id }}</strong>
                    </div>
                    <div class="panel-body">
                        {!! Form::model($data, ['method' => 'PATCH', 'action' => ['Admin\OrderController@update', $data->id], 'class' => 'form-horizontal', 'files' => true]) !!}

                        @include('user.order.form')

                        {!! Form::Hidden('id', $data->id) !!}

                        {!! Form::close() !!}
                    </div>
                </div>

                <div class="panel">
                    <div class="panel-heading">
                        {{ trans('order.order_items') }}
                    </div>
                    <div class="panel-body">
                        <table class="table admin-form theme-warning tc-checkbox-1 fs13">
                            <thead>
                                <tr class="bg-light">
                                    <th class="">
                                        {{ trans('order.product_name') }}
                                    </th>
                                    <th class="text-center">
                                        {{ trans('order.quantity') }}
                                    </th>
                                    <th class="text-right">
                                        {{ trans('order.price') }}
                                    </th>
                                    <th class="text-right">
                                        {{ trans('order.total') }}
                                    </th>
                                </tr>
                            </thead>
                        <tbody>
                            @foreach($data->orderItems as $item)
                            <tr>
                                <td class="text-left">
                                    <strong>{{ $item->name }}</strong>
                                </td>
                                <td class="text-center">
                                    {{ $item->quantity }}
                                </td>
                                <td class="text-right">
                                    {{ money_format($item->price) }}
                                </td>
                                <td class="text-right">
                                    {{ money_format($item->price * $item->quantity) }}
                                </td>

                            </tr>
                            @endforeach
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop