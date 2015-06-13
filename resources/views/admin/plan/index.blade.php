@extends('_layout.admin')

@section('content')
    @include('admin.plan.topbar')
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
                                    Tên gói
                                </th>
                                <th>
                                    Giá tiền
                                </th>
                                <th>
                                    Thời hạn
                                </th>
                                <th class="text-right">
                                    Tình trạng
                                </th>
                                <th class="text-right">
                                    Công cụ
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
                                    {{ $row->name }}
                                </td>
                                <td>
                                    {{ number_format($row->price, 0, null, '.') }}đ
                                </td>
                                <td>
                                    {{ $row->type }}
                                </td>
                                <?php
                                    if($row->status){
                                        $text = 'Kích hoạt';
                                        $updateStatus = 0;
                                        $class = 'success';
                                    }else{
                                        $text = 'Khóa';
                                        $updateStatus = 1;
                                        $class = 'danger';
                                    }
                                ?>
                                <td class="text-right">
                                    {!! Form::open(['action' => ['Admin\PlanController@updateStatus', $row->id, $updateStatus], 'id' => 'row-' . $row->id]) !!}
                                    <button type="submit" class="btn btn-{{ $class }} br2 btn-xs fs12">
                                        {{ $text }}
                                    </button>
                                    {!! Form::close() !!}
                                </td>
                                <td class="text-right">
                                    <div class="btn-group text-right">
                                        <button type="button" class="btn btn-info br2 btn-xs fs12 dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                            Công cụ
                                            <span class="caret ml5"></span>
                                        </button>
                                        <ul class="dropdown-menu" role="menu">
                                            <li>
                                                <a href="{{ action('Admin\PlanController@edit', $row->id) }}">
                                                    Sửa
                                                </a>
                                            </li>
                                            <li>
                                                {!! Form::open(['method' => 'delete', 'action' => ['Admin\PlanController@destroy', $row->id], 'id' => 'row-' . $row->id]) !!}
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
        var ok = confirm('Bạn muốn xóa tài khoản này?');

        if(!ok)
            return false;

        var id = $(this).attr('data-id');
        $('form#row-' + id).submit();
    });

    $('a#update-status-disable').click(function(){
        var id = $(this).attr('data-id');
        $('form#update-status-' + id).children('input#status').val(0);
        $('form#update-status-' + id).submit();
    });

    $('a#update-status-enable').click(function(){
        var id = $(this).attr('data-id');
        $('form#update-status-' + id).children('input#status').val(1);
        $('form#update-status-' + id).submit();
    });

    $('input#select-all').click(function(){
        var f = $(this).prop('checked');
        $('input#select').prop('checked', f);
    });

});

</script>

@endsection