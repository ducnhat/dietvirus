@extends('_layout.admin')

@section('content')
    @include('admin.product.topbar')
    <section id="content" class="table-layout animated fadeIn">
        <div class="tray tray-center p25 va-t posr">
            <div class="panel mb25 mt5">
                <div class="panel-body p20 pb10">
                    <table id="datatable" class="table admin-form theme-warning fs13">
                        <thead>
                            <tr class="bg-light">
                                <th class="text-center">
                                    {{ trans('order.customer_name') }}
                                </th>
                                <th class="text-center">
                                    {{ trans('order.customer_email') }}
                                </th>
                                <th class="text-right">
                                    {{ trans('order.customer_phone') }}
                                </th>
                                <th class="text-right">
                                    {{ trans('order.total') }}
                                </th>
                                <th class="text-center">
                                    {{ trans('order.payment') }}
                                </th>
                                <th class="text-center">
                                    Công cụ
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($data as $row)
                            <tr>
                                <td>
                                    {{ $row->name }}
                                </td>
                                <td class="text-center">
                                    {{ $row->email }}
                                </td>
                                <td class="text-right">
                                    {{ phone_format($row->phone) }}
                                </td>
                                <td class="text-right">
                                    {{ money_format($row->total) }}
                                </td>
                                <td class="text-right">
                                    @if(!$row->is_paid)
                                        <div class="bg-warning pv5 text-white fw600 text-center">
                                            {{ trans('order.not_yet') }}
                                        </div>
                                    @else
                                        <div class="bg-warning pv5 text-white fw600 text-center">
                                            {{ $row->paid_at }}
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ action('Admin\OrderController@show', $row->id) }}" class="btn btn-sm btn-info btn-block">
                                        {{ trans('order.view_detail') }}
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

@stop

@section('script')

<script>

$(document).ready(function(){

});

</script>

@endsection