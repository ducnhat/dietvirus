@extends('_layout.user')

@section('content')
    <section id="content" class="table-layout animated fadeIn">
        <div class="tray tray-center p25 va-t posr">
            <div class="panel mb25 mt5">
                <div class="panel-body p20 pb10">
                    <table id="datatable5" class="table table-bordered table-hover admin-form theme-warning fs13">
                        <thead>
                            <tr class="bg-light">
                                <th class="text-center sorting_desc" width="50">
                                    <strong>#</strong>
                                </th>
                                <th class="text-center">
                                    {{ trans('order.customer_name') }}
                                </th>
                                <th class="text-center">
                                    {{ trans('order.customer_email') }}
                                </th>
                                <th class="text-center">
                                    {{ trans('order.customer_phone') }}
                                </th>
                                <th class="text-center">
                                    {{ trans('order.created_at') }}
                                </th>
                                <th class="text-center">
                                    {{ trans('order.payment') }}
                                </th>
                                <th class="text-center">
                                    {{ trans('order.sent_key') }}
                                </th>
                                <th data-orderable="false" class="text-center">
                                    {{ trans('form.tools') }}
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($data as $row)
                            <tr>
                                <td class="text-center" data-order="{{ $row->id }}">
                                    #{{ $row->id }}
                                </td>
                                <td>
                                    {{ $row->name }}
                                </td>
                                <td class="text-center">
                                    {{ $row->email }}
                                </td>
                                <td data-search="0{{ $row->phone }}" class="text-right">
                                    {{ phone_format($row->phone) }}
                                </td>
                                <td class="text-right">
                                    {{ $row->created_at->format('H:i d/m/Y') }}
                                </td>
                                <td data-search="{{ (is_null($row->paid_at)) ? "0" : "1" }}" class="text-right">
                                    @if(is_null($row->paid_at))
                                        <div class="bg-warning pv5 text-white fw600 text-center">
                                            {{ trans('order.not_yet') }}
                                        </div>
                                    @else
                                        <div class="bg-success pv5 text-white fw600 text-center">
                                            {{ $row->paid_at->format('H:i d/m/Y') }}
                                        </div>
                                    @endif
                                </td>
                                <td data-search="{{ (is_null($row->sent_at)) ? "0" : "1" }}" class="text-right">
                                    @if(is_null($row->sent_at))
                                        <div class="bg-warning pv5 text-white fw600 text-center">
                                            {{ trans('order.not_yet') }}
                                        </div>
                                    @else
                                        <div class="bg-success pv5 text-white fw600 text-center">
                                            {{ $row->sent_at->format('H:i d/m/Y') }}
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ action('User\OrderController@show', $row->id) }}" class="btn btn-sm btn-info btn-block">
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

@endsection