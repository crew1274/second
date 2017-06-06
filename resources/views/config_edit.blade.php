@extends('layouts.dashboard')
@push('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css">
@endpush
@section('title',trans('config.edit_peak_time_config'))
@section('page_heading',trans('config.edit_peak_time_config'))
@section('section')
<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('peak.index') }}"> {{trans('config.back')}}</a>
            </div>
        </div>
    </div>

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {!! Form::model($config, ['method' => 'PATCH','route' => ['config.update', $config->id]]) !!}
    {{ csrf_field() }}

    <div class="row">
    <div class="col-xs-6 col-sm-6 col-md-4">
        <div class="form-group">
            <strong>{{trans('config.day')}}:</strong>
            {!!
            Form::select('day', array(
              'weekday' => trans('config.weekday')
            , 'weekend' => trans('config.weekend')
            , 'holiday' => trans('config.holiday') ),null,['class'=>'form-control'])!!}
        </div>
    </div>
    </div>


        <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-4">
            <div class="form-group">
                <strong>{{trans('config.start_time')}}:</strong>
                  <div class='input-group date' id='start'>
                  {!! Form::text('start', null, array('class' => 'form-control')) !!}
                  <span class="input-group-addon">
                      <span class="glyphicon glyphicon-time"></span>
                  </span>
                  </div>
            </div>
        </div>
        </div>

        <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-4">
            <div class="form-group">
                <strong>{{trans('config.end_time')}}:</strong>
                <div class='input-group date' id='end'>
                {!! Form::text('end', null, array('class' => 'form-control')) !!}
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-time"></span>
                </span>
                </div>
            </div>
        </div>
        </div>
        <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-4">
            <div class="form-group">
                <strong>{{trans('config.state')}}:</strong>
                {!!
                Form::select('state', array(
                  'peak' => trans('config.peak')
                , 'half_peak' => trans('config.half_peak') ),null,['class'=>'form-control'])!!}
            </div>
        </div>
        </div>

        <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-4 text-left">
                <button type="submit" class="btn btn-primary">{{trans('config.update')}}</button>
        </div>
        </div>
    </div>
    {!! Form::close() !!}
@stop
@stop
@push('javascript')
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js" type="text/javascript" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js" type="text/javascript" ></script>
    <script>
            $(function () {
                $('#start').datetimepicker({
                    format: 'HH:mm:ss'
                });
            });
    </script>

		<script >
	            $(function () {
	                $('#end').datetimepicker({
	                    format: 'HH:mm:ss'
	                });
	            });
	    </script>
@endpush
