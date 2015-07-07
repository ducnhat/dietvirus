@extends('_layout.admin')

@section('content')
    @include('admin.product.topbar')
    <section id="content" class="table-layout animated fadeIn">
        <div class="tray tray-center p25 va-t posr">
            <div class="panel mb25 mt5">
                <div class="panel-body p20 pb10">
                    <table id="datatable5" class="table table-bordered table-hover admin-form theme-warning tc-checkbox-1 fs13">
                        <thead>
                            <tr class="bg-light">
                                <th class="text-center">
{{--                                    {{ trans('page.title') }}--}}
                                    <input class="form-control" placeholder="{{ trans('page.name') }}" />
                                </th>
                                <th class="text-center">
{{--                                    {{ trans('page.publish_at') }}--}}
                                    <input class="form-control" placeholder="{{ trans('page.show_on_menu') }}" />
                                </th>
                                <th class="text-center">
{{--                                    {{ trans('page.publish_at') }}--}}
                                    <input class="form-control" placeholder="{{ trans('page.is_published') }}" />
                                </th>
                                <th class="text-center">
{{--                                    {{ trans('page.publish_at') }}--}}
                                    <input class="form-control" placeholder="{{ trans('page.publish_at') }}" />
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
                                    <strong>{{ $row->name }}</strong>
                                </td>
                                <td class="text-center">
                                    @if($row->show_on_menu)
                                        <div class="bg-success pv5 text-white fw600 text-center">
                                            {{ trans('form.yes') }}
                                        </div>
                                    @else
                                        <div class="bg-warning pv5 text-white fw600 text-center">
                                            {{ trans('form.no') }}
                                        </div>
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if($row->is_published)
                                        <div class="bg-success pv5 text-white fw600 text-center">
                                            {{ trans('form.yes') }}
                                        </div>
                                    @else
                                        <div class="bg-warning pv5 text-white fw600 text-center">
                                            {{ trans('form.no') }}
                                        </div>
                                    @endif
                                </td>
                                <td data-search="{{ $row->publish_at->format("H:i d/m/Y") }}" class="text-center">
                                    {{ $row->publish_at->format("H:i d/m/Y") }}
                                </td>
                                <td class="text-right">
                                    <div class="btn-group text-right">
                                        <button type="button" class="btn btn-info br2 btn-xs fs12 dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                            {{ trans('form.tools') }}
                                            <span class="caret ml5"></span>
                                        </button>
                                        <ul class="dropdown-menu" role="menu">
                                            <li>
                                                <a href="{{ action('Admin\PageController@edit', $row->id) }}">
                                                    Sửa
                                                </a>
                                            </li>
                                            <li>
                                                {!! Form::open(['method' => 'delete', 'action' => ['Admin\PageController@destroy', $row->id], 'id' => 'row-' . $row->id]) !!}
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
        var ok = confirm('{{ trans('page.delete') }}');

        if(!ok)
            return false;

        var id = $(this).attr('data-id');
        $('form#row-' + id).submit();
    });
});

</script>

@endsection