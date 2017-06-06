@extends('layouts.dashboard')
@section('title',trans('setting.initial_setting'))
@section('page_heading',trans('setting.initial_setting'))
@section('section')
@if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @elseif ($message = Session::get('dangerous'))
    <div class="alert alert-dangerous">
        <p>{{ $message }}</p>
    </div>
    @endif

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>{{trans('setting.current_initial_setting')}}</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('boot.create') }}">
                    {{trans('setting.create_new_setting')}}</a>
            </div>
        </div>
    </div>


    <table class="table table-bordered">
    <thead>
        <tr>
            <th>{{trans('setting.model')}}</th>
            <th>{{trans('setting.address')}}</th>
            <th>{{trans('setting.channel')}}</th>
            <th>{{trans('setting.baud_rate')}}</th>
            <th>{{trans('setting.circuit')}}</th>
            <th width="280px">{{trans('setting.action')}}</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($settings as $setting)
    @if  ($setting->token == false)
    <tr class="danger">
        <td><p class="text-danger">{{ $setting->model }}</p></td>
        <td><p class="text-danger">{{ $setting->address }}</p></td>
        <td><p class="text-danger">{{ $setting->ch }}</p></td>
        <td><p class="text-danger">{{ $setting->speed }}</p></td>
        <td><p class="text-danger">{{ $setting->circuit }}</p></td>
        <td>
            <a class="btn btn-primary" href="{{ route('boot.edit',$setting->id) }}">{{trans('setting.edit')}}</a>
            {!! Form::open(['method' => 'DELETE','route' => ['boot.destroy', $setting->id],'style'=>'display:inline']) !!}
            {!! Form::submit(trans('setting.delete'), ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
            <a class="btn btn-warning" href="{{ route('boot.show',$setting->id) }}">{{trans('setting.valid')}}</a>
        </td>
    </tr>
    @else
    <tr class="info">
        <td><p class="text-info">{{ $setting->model }}</p></td>
        <td><p class="text-info">{{ $setting->address }}</p></td>
        <td><p class="text-info">{{ $setting->ch }}</p></td>
        <td><p class="text-info">{{ $setting->speed }}</p></td>
        <td><p class="text-danger">{{ $setting->circuit }}</p></td>
        <td>
            <a class="btn btn-primary" href="{{ route('boot.edit',$setting->id) }}">{{trans('setting.edit')}}</a>
            {!! Form::open(['method' => 'DELETE','route' => ['boot.destroy', $setting->id],'style'=>'display:inline']) !!}
            {!! Form::submit( trans('setting.delete') , ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
        </td>
    </tr>

    @endif
    @endforeach
    </tbody>
    </table>
    {!! $settings->render() !!}

@stop
