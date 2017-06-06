@extends('layouts.dashboard')
@section('title',trans('network.network'))
@section('page_heading',trans('network.network'))
@section('section')
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#dhcp" data-whatever="@dhcp">{{trans('network.dhcp')}}</button>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#static" data-whatever="@static">{{trans('network.static_ip')}}</button>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#wifi" data-whatever="@wifi">{{trans('network.wifi')}}</button>


<div class="modal fade" id="dhcp" tabindex="-1" role="dialog" aria-labelledby="dhcp">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">{{trans('network.dhcp')}}</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">{{trans('network.close')}}</button>
        <button type="button" class="btn btn-primary">{{trans('network.use')}}</button>
      </div>
    </div>
  </div>
</div>


{!! Form::open(array('route' => 'network/staticip','method'=>'POST')) !!}

{{ csrf_field() }}
<div class="modal fade" id="static" tabindex="-1" role="dialog" aria-labelledby="static">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">{{trans('network.static_ip')}}</h4>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name" class="control-label">{{trans('network.wan')}}:</label>
        {!! Form::text('wan', null, array('placeholder' => trans('network.wan'),'class' => 'form-control')) !!}
          </div>
          <div class="form-group">
            <label for="recipient-name" class="control-label">{{trans('network.mask')}}:</label>
        {!! Form::text('mask', null, array('placeholder' => trans('network.mask'),'class' => 'form-control')) !!}
          </div>
          <div class="form-group">
            <label for="recipient-name" class="control-label">{{trans('network.gateway')}}:</label>
            {!! Form::text('gateway', null, array('placeholder' => trans('network.gateway'),'class' => 'form-control')) !!}
          </div>
          <div class="form-group">
            <label for="recipient-name" class="control-label">{{trans('network.dns')}}:</label>
        {!! Form::text('dns', null, array('placeholder' => trans('network.dns'),'class' => 'form-control')) !!}
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">{{trans('network.close')}}</button>
        <button type="button" class="btn btn-primary">{{trans('network.use')}}</button>
      </div>
    </div>
  </div>
</div>
{!! Form::close() !!}

{!! Form::open(array('route' => 'network/wifi','method'=>'POST')) !!}
{{ csrf_field() }}

<div class="modal fade" id="wifi" tabindex="-1" role="dialog" aria-labelledby="wifi">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">{{trans('network.wifi')}}</h4>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name"class="control-label">{{trans('network.wifi_name')}}:</label>
            {!! Form::text('wifiname', 'wifiname', array('placeholder' => trans('network.wifi_name'),'class' => 'form-control')) !!}
          </div>
          <div class="form-group">
            <label for="recipient-name" class="control-label">{{trans('network.password')}}:</label>
            <input class="form-control" placeholder="{{ trans('network.password') }}" name="wifipassword" type="password" value="">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">{{trans('network.close')}}</button>
        <button type="submit" class="btn btn-primary">{{trans('network.use')}}</button>
      </div>
    </div>
  </div>
</div>
{!! Form::close() !!}


@stop
