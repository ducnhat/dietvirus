@extends('_layout.admin')

@section('content')
    @include('admin.product.topbar')
    <section id="content" class="table-layout animated fadeIn">
        <div class="tray tray-center p25 va-t posr">
            <div class="panel mb25 mt5">
                <div class="panel-body p20 pb10">
                    <table id="datatable5" class="table table-bordered table-hover admin-form theme-warning fs13">
                        <thead>
                            <tr class="bg-light">
                                <th class="text-center">
                                    {{ trans('contact.name') }}
                                    {!! Form::Text('name', null, ['class' => 'form-control', 'placeholder' => trans('contact.name')]) !!}
                                </th>
                                <th class="text-center">
                                    {{ trans('contact.email') }}
                                    {!! Form::Text('title', null, ['class' => 'form-control', 'placeholder' => trans('contact.email')]) !!}
                                </th>
                                <th class="text-center">
                                    {{ trans('contact.title') }}
                                    {!! Form::Text('title', null, ['class' => 'form-control', 'placeholder' => trans('contact.title')]) !!}
                                </th>
                                <th class="text-center">
                                    {{ trans('contact.reply') }}
                                    {!! Form::Text('reply', null, ['class' => 'form-control', 'placeholder' => trans('contact.reply')]) !!}
                                </th>
                                <th class="text-center">
                                    {{ trans('form.created_at') }}
                                    {!! Form::Text('created_at', null, ['class' => 'form-control', 'placeholder' => trans('contact.title')]) !!}
                                </th>
                                <th data-orderable="false" class="text-center">
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
                                    {{ $row->email }}
                                </td>
                                <td class="text-center">
                                    {{ $row->title }}
                                </td>
                                <td data-search="{{ (is_null($row->is_reply)) ? "0" : "1" }}" class="text-right">
                                    @if($row->is_reply)
                                        <div class="bg-success pv5 text-white fw600 text-center">
                                            {{ trans('contact.already') }}
                                        </div>
                                    @else
                                        <div class="bg-warning pv5 text-white fw600 text-center">
                                            {{ trans('contact.not_yet') }}
                                        </div>
                                    @endif
                                </td>
                                <td class="text-right">
                                    {{ $row->created_at->format('H:i d/m/Y') }}
                                </td>
                                <td>
                                    <a href="{{ action('Admin\ContactController@edit', $row->id) }}" class="btn btn-sm btn-info btn-block">
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
//    var table = $("#datatable5").dataTable();
});

</script>

@endsection