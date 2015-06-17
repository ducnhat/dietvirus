@extends('_layout.admin')

@section('content')
    @include('admin.product-key.topbar')
    <section id="content" class="table-layout animated fadeIn">
        <div class="tray tray-center p25 va-t posr">
            <div class="panel mb25 mt5">
                <div class="panel-body p20 pb10">
                    <table id="datatable" class="table admin-form theme-warning tc-checkbox-1 fs13">
                        <thead>
                            <tr class="bg-light">
                                <th class="text-center">
                                    <div class="mb15">
                                        <label class="field option block">
                                            <input type="checkbox" id="select-all">
                                            <span class="checkbox"></span>
                                        </label>
                                    </div>
                                </th>
                                <th>
                                    {{ trans('form.product_key') }}
                                </th>
                                <th>
                                    {{ trans('form.product_name') }}
                                </th>
                                <th>
                                    {{ trans('form.created_by_user') }}
                                </th>
                                <th class="text-right">
                                    {{ trans('form.created_at') }}
                                </th>
                                <th class="text-right">
                                    {{ trans('form.tools') }}
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($data as $row)
                            <tr>
                                <td class="text-center">
                                    <div class="mb15">
                                        <label class="field option block">
                                            <input type="checkbox" id="select" name="{{ $row->id }}">
                                            <span class="checkbox"></span>
                                        </label>
                                    </div>
                                </td>
                                <td>
                                    {{ $row->key }}
                                </td>
                                <td class="text-left">
                                    {{ $row->product_id }}
                                </td>
                                <td class="text-left">
                                    {{ $row->user_id }}
                                </td>
                                <td class="text-center">
                                    {{ $row->created_at->format('d/m/Y') }}
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