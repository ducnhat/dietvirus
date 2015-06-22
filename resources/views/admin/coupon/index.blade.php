@extends('_layout.admin')

@section('content')
    @include('admin.coupon.topbar')
    <section id="content" class="table-layout animated fadeIn">
        <div class="tray tray-center p25 va-t posr">
            <div class="panel mb25 mt5">
                <div class="panel-body p20 pb10">
                    <table id="datatable" class="table table-striped table-hover dataTable">
                        <thead>
                            <tr class="bg-light">
                                <th>
                                    {{ trans('coupon.name') }}
                                </th>
                                <th>
                                    {{ trans('coupon.coupon') }}
                                </th>
                                <th>
                                    {{ trans('coupon.condition') }}
                                </th>
                                <th>
                                    {{ trans('coupon.value') }}
                                </th>
                                <th>
                                    {{ trans('coupon.quantity') }}
                                </th>
                                <th>
                                    {{ trans('coupon.is_used') }}
                                </th>
                                <th>
                                    {{ trans('coupon.start_date') }}
                                </th>
                                <th class="text-right">
                                    {{ trans('coupon.end_date') }}
                                </th>
                                <th class="text-right">
                                    {{ trans('form.tools') }}
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
                                    {{ $row->coupon }}
                                </td>
                                <td class="text-right">
                                    {{ money_format($row->condition) }}
                                </td>
                                <td class="text-right">
                                    {{ coupon_value($row->value) }}
                                </td>
                                <td class="text-right">
                                    {{ money_format($row->quantity, ' ') }}
                                </td>
                                <td class="text-right">
                                    {{ money_format($row->is_used, ' ') }}
                                </td>
                                <td class="text-left">
                                    {{ $row->start_date->format('d/m/Y') }}
                                </td>
                                <td class="text-left">
                                    {{ $row->end_date->format('d/m/Y') }}
                                </td>
                                <td class="text-right">
                                    <div class="btn-group text-right">
                                        <button type="button" class="btn btn-info br2 btn-xs fs12 dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                            Công cụ
                                            <span class="caret ml5"></span>
                                        </button>
                                        <ul class="dropdown-menu" role="menu">
                                            <li>
                                                <a href="{{ action('Admin\CouponController@edit', $row->id) }}">
                                                    Sửa
                                                </a>
                                            </li>
                                            <li>
                                                {!! Form::open(['method' => 'delete', 'action' => ['Admin\ProductKeyController@destroy', $row->id], 'id' => 'row-' . $row->id]) !!}
                                                {!! Form::close() !!}
                                                <a href="#" data-id="{{ $row->id }}" id="delete">Xóa</a>
                                            </li>
                                        </ul>
                                    </div>
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
    $('a#delete').click(function(){
        var ok = confirm('{{ trans('message.delete_product_key') }}');

        if(!ok)
            return false;

        var id = $(this).attr('data-id');
        $('form#row-' + id).submit();
    });

    $('input#select-all').click(function(){
        var f = $(this).prop('checked');
        $('input#select').prop('checked', f);
    });
});

</script>

@endsection