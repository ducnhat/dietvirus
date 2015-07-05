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
{{--                                    {{ trans('post.title') }}--}}
                                    <input class="form-control" placeholder="{{ trans('post.name') }}" />
                                </th>
                                <th class="text-center">
{{--                                    {{ trans('post.title') }}--}}
                                    <input class="form-control" placeholder="{{ trans('post.email') }}" />
                                </th>
                                <th class="text-center">
{{--                                    {{ trans('post.created_at') }}--}}
                                    <input class="form-control" placeholder="{{ trans('post.created_at') }}" />
                                </th>
                                <th class="text-center">
{{--                                    {{ trans('post.created_at') }}--}}
                                    <input class="form-control" placeholder="{{ trans('post.confirm') }}" />
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
                                    {{ $row->email }}
                                </td>
                                <td data-search="{{ $row->created_at->format("H:i d/m/Y") }}" class="text-center">
                                    {{ $row->created_at->format("H:i d/m/Y") }}
                                </td>
                                <td data-search="{{ ($row->is_display) ? "0" : "1" }}" class="text-right">
                                    @if(!$row->is_display)
                                        <div class="bg-warning pv5 text-white fw600 text-center">
                                            {{ trans('post.not_yet') }}
                                        </div>
                                    @else
                                        <div class="bg-success pv5 text-white fw600 text-center">
                                            {{ $row->user->name }}
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ action('Admin\PostCommentController@edit', $row->id) }}" class="btn btn-sm btn-info btn-block">
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
    $('a#delete').click(function(){
        var ok = confirm('{{ trans('post.delete') }}');

        if(!ok)
            return false;

        var id = $(this).attr('data-id');
        $('form#row-' + id).submit();
    });
});

</script>

@endsection