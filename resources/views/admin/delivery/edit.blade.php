@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.delivery.title')</h3>

    {!! Form::model($delivery, ['method' => 'PUT', 'files'=>'true','route' => ['admin.delivery.update', $delivery->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('user', 'Email*', ['class' => 'control-label']) !!}
                    {!! Form::select('user', old('user') ? old('user') : $delivery->user()->pluck('email','id'),$users, ['class' => 'form-control select2', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('user'))
                        <p class="help-block">
                            {{ $errors->first('user') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('date', 'Date Time*', ['class' => 'control-label']) !!}
                    {!! Form::dateTime('date', old('date'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('date'))
                        <p class="help-block">
                            {{ $errors->first('date') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('quantity', 'Quantity*', ['class' => 'control-label']) !!}
                    {!! Form::text('quantity', old('date'),['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('quantity'))
                        <p class="help-block">
                            {{ $errors->first('quantity') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
            <div class="col-xs-12 form-group">
                {!! Form::label('status', 'Status*', ['class' => 'control-label']) !!}
                {!! Form::select('status',['rejected','accepted'], old('status'), ['class' => 'form-control select2', 'required' => '']) !!}
                <p class="help-block"></p>
                @if($errors->has('status'))
                    <p class="help-block">
                        {{ $errors->first('status') }}
                    </p>
                @endif
            </div>
          </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('price', 'Price*', ['class' => 'control-label']) !!}
                    {!! Form::text('price',old('price'),  ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('price'))
                        <p class="help-block">
                            {{ $errors->first('price') }}
                        </p>
                    @endif
                </div>
            </div>

        </div>
    </div>

    {!! Form::submit(trans('global.app_update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop
