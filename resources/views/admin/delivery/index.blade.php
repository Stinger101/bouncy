@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.delivery.title')</h3>
    <p>  @cannot('farmer_manage')
        <a href="{{ route('admin.delivery.create') }}" class="btn btn-success">@lang('global.app_add_new')</a>
        @endcannot
    </p>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($deliveries) > 0 ? 'datatable' : '' }} dt-select">
                <thead>
                    <tr>
                        <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @cannot('farmer_manage')
                        <th>@lang('global.delivery.fields.user')</th>
                        @endcannot
                        <th>@lang('global.delivery.fields.date')</th>
                        <th>@lang('global.delivery.fields.quantity')</th>
                        <th>@lang('global.delivery.fields.price')</th>
                        <th>@lang('global.delivery.fields.status')</th>
                        @cannot('farmer_manage')
                        <th>&nbsp;</th>
                        @endcannot

                    </tr>
                </thead>

                <tbody>
                    @if (count($deliveries) > 0)
                        @foreach ($deliveries as $delivery)
                            <tr data-entry-id="{{ $delivery->id }}">
                                <td></td>
                                @cannot('farmer_manage')
                                <td>{{ $delivery->user()->pluck('email') }}</td>
                                @endcannot
                                <td>{{ $delivery->date }}</td>
                                <td>{{$delivery->quantity}}</td>
                                <td>{{$delivery->price}}</td>
                                <td>{{$delivery->status}}</td>
                                @cannot('farmer_manage')
                                <td>
                                    <a href="{{ route('admin.delivery.edit',[$delivery->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.delivery.destroy', $delivery->id])) !!}
                                    {!! Form::submit(trans('global.app_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                </td>
                                @endcannot
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="3">@lang('global.app_no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@cannot('farmer_manage')
@section('javascript')
    <script>
        window.route_mass_crud_entries_destroy = '{{ route('admin.delivery.mass_destroy') }}';
    </script>
@endsection
@endcannot
