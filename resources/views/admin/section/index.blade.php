@extends('_layout.admin')

@section('content')
    @include('admin.section.topbar')
    <section id="content" class="table-layout animated fadeIn">
        <div class="tray tray-center p25 va-t posr">
            <div class="panel mb25 mt5">
                <div class="panel-body p20 pb10">
                    <table class="table admin-form theme-warning tc-checkbox-1 fs13">
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
                            Danh mục
                        </th>
                        <th>
                            Khóa học
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
                                    {{ $row->course->name }}
                                </td>
                                <?php
                                if ($row->status) {
                                    $class_active = 'active';
                                    $class_disabled = '';
                                    $class = 'success';
                                } else {
                                    $class_active = '';
                                    $class_disabled = 'active';
                                    $class = 'danger';
                                }
                                ?>
                                <td class="text-right">
                                    <div class="btn-group text-right">
                                        <button type="button" class="btn btn-{{ $class }} br2 btn-xs fs12 dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                            Công cụ
                                            <span class="caret ml5"></span>
                                        </button>
                                        <ul class="dropdown-menu" role="menu">
                                            <li>
                                                <a href="{{ action('Admin\SectionController@edit', $row->id) }}">
                                                    Sửa
                                                </a>
                                            </li>
                                            <li>
                                                {!! Form::open(['method' => 'delete', 'action' => ['Admin\SectionController@destroy', $row->id], 'id' => 'row-' . $row->id]) !!}
                                                {!! Form::close() !!}
                                                <a href="#" data-id="{{ $row->id }}" id="delete">Xóa</a>
                                            </li>
                                            <li class="divider"></li>
                                            <li class="{{ $class_active }}">
                                                <a href="#">Kích hoạt</a>
                                            </li>
                                            <li class="{{ $class_disabled }}">
                                                <a href="#">Khóa</a>
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
        @include('admin.section.filter')
    </section>

@stop

@section('script')

<script>

function confirm_delete() {
    var ok = confirm('Bạn chắc chắn muốn xóa danh mục này?');

    if (!ok)
        return false;
}

</script>

@endsection