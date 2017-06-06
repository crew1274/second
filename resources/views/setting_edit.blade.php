@extends('layouts.dashboard')
@section('title',trans('setting.edit_inital_setting'))
@section('page_heading',trans('setting.edit_inital_setting'))
@section('section')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('boot.index') }}"> {{trans('setting.back')}}</a>
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

    {!! Form::model($setting, ['method' => 'PATCH','route' => ['boot.update', $setting->id]]) !!}
    {{ csrf_field() }}
    <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-4">
            <div class="form-group">
                <strong>{{trans('setting.model')}}:</strong>
                {!!
                Form::select('model',$models,null,['class'=>'form-control'])!!}

            </div>
        </div>
        </div>
        <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-4">
            <div class="form-group">
                <strong>{{trans('setting.address')}}:</strong>
                  {!! Form::text('address', null, array('placeholder' => '1~255','class' => 'form-control')) !!}
            </div>
        </div>
        </div>
        <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-4">
            <div class="form-group">
                <strong>{{trans('setting.channel')}}:</strong>
                  {!! Form::text('ch', null, array('placeholder' => '1~15','class' => 'form-control')) !!}
            </div>
        </div>
        </div>
        <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-4">
            <div class="form-group">
                <strong>{{trans('setting.baud_rate')}}:</strong>
                {!!
                Form::select('speed', array('1200' => '1200'
                , '2400' => '2400'
                , '4800' => '4800'
                , '9600' => '9600'),null,['class'=>'form-control'])!!}
            </div>
        </div>
        </div>

        <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-4">
            <div class="form-group">
                <strong>{{trans('setting.circuit')}}:</strong>
                {!! Form::text('circuit', null, array('placeholder' => '1~72','class' => 'form-control')) !!}
                <em>({{trans('setting.unique')}})</em>
            </div>
        </div>
        </div>


        <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-4 text-left">
                <button type="submit" class="btn btn-primary">{{trans('setting.update')}}</button>
        </div>
        </div>
    </div>
    {!! Form::close() !!}


@stop
