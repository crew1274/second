@extends ('layouts.plane')
@section('title',trans('server.link'))
@section('body')
<div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
            <br /><br /><br />
            @section ('link_panel_title',trans('server.link_info'))
            @section ('link_panel_body')

            {!! Form::open(array('route' => 'link','method'=>'POST')) !!}
                {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('ip') ? ' has-error' : '' }}">
                            <label for="ip" class="col-md-4 control-label">{{trans('server.ip')}}:</label>
                            <div class="col-md-6">
                            {!! Form::text('ip', $link->ip, array('placeholder' => trans('server.ip'),'class' => 'form-control')) !!}
                                @if ($errors->has('ip'))
                                <span class="help-block">
                                <strong>{{ $errors->first('ip') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('domain') ? ' has-error' : '' }}">
                            <label for="domain" class="col-md-4 control-label">@lang('server.domain') :</label>
                            <div class="col-md-6">
                            {!! Form::text('domain', $link->domain, array('placeholder' => trans('server.domain'),'class' => 'form-control')) !!}
                                @if ($errors->has('domain'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('domain') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('port') ? ' has-error' : '' }}">
                            <label for="port" class="col-md-4 control-label">@lang('server.port') :</label>
                            <div class="col-md-6">
                            {!! Form::text('port', $link->port, array('placeholder' => trans('server.port'),'class' => 'form-control')) !!}
                                @if ($errors->has('port'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('port') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('path') ? ' has-error' : '' }}">
                            <label for="path" class="col-md-4 control-label">@lang('server.path') :</label>
                            <div class="col-md-6">
                            {!! Form::text('path', $link->path, array('placeholder' => trans('server.path'),'class' => 'form-control')) !!}
                                @if ($errors->has('path'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('path') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('key') ? ' has-error' : '' }}">
                            <label for="key" class="col-md-4 control-label">@lang('server.key') :</label>
                            <div class="col-md-6">
                                <input id="key" type="password" class="form-control" name="key"  value="{{$link->key}}">
                                @if ($errors->has('key'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('key') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        </div>
                        </div>
                        <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">{{trans('server.apply')}}</button>
                        </div>
                        </div>
                    </form>
                    {!! Form::close() !!}

            @endsection
            @include('widgets.panel', array('as'=>'link', 'header'=>true,'controls'=>true))
            </div>
        </div>
</div>
@stop