@extends('_layout.admin')

@section('content')
    @include('admin.product-key.topbar')
    <section id="content" class="table-layout animated fadeIn">
        <div class="tray tray-center p25 va-t posr">
            <div class="panel mb25 mt5">
                <div class="panel-body p20 pb10">
                    <table id="datatable5" class="table admin-form theme-warning tc-checkbox-1 fs13">
                        <thead>
                            <tr class="bg-light">
                                <th class="text-center">
                                    {{ trans('form.product_key') }}
                                    {!! Form::Text('coupon', null, ['class' => 'form-control', 'placeholder' => 'XXXXX-XXXXX-XXXXX-XXXXX']) !!}
                                </th>
                                <th class="text-center">
                                    {{ trans('form.product_name') }}
                                    {!! Form::Text('coupon', null, ['class' => 'form-control', 'placeholder' => trans('form.product_name')]) !!}
                                </th>
                                <th class="text-center">
                                    {{ trans('form.created_by_user') }}
                                    {!! Form::Text('coupon', null, ['class' => 'form-control', 'placeholder' => trans('form.name')]) !!}
                                </th>
                                <th class="text-center">
                                    {{ trans('form.created_at') }}
                                    {!! Form::Text('coupon', null, ['class' => 'form-control', 'placeholder' => trans('form.created_at')]) !!}
                                </th>
                                <th class="text-right">
                                    {{ trans('form.tools') }}
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($data as $row)
                            <tr>
                                <td class="text-left">
                                    {{ $row->key }}
                                </td>
                                <td class="text-left">
                                    {{ $row->product->name }}
                                </td>
                                <td class="text-center">
                                    {{ $row->user->name }}
                                </td>
                                <td data-search="{{ $row->created_at }}" class="text-center">
                                    {{ $row->created_at->format('H:i d/m/Y') }}
                                </td>
                                <td class="text-right">
                                    <div class="btn-group text-right">
                                        <button type="button" class="btn btn-info br2 btn-xs fs12 dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                            Công cụ
                                            <span class="caret ml5"></span>
                                        </button>
                                        <ul class="dropdown-menu" role="menu">
                                            <li>
                                                <a href="{{ action('Admin\ProductKeyController@edit', $row->id) }}">
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