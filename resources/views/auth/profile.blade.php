@extends ('layouts.plane')
@section('title',trans('auth.profile'))
@section('body')
<div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
            <br /><br /><br />
               @section ('profile_panel_title',trans('auth.personal_info'))
               @section ('profile_panel_body')
					{!! Form::open(['url' => 'profile/update']) !!}
					{{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
  <label for="name" class="col-md-4 control-label">{{trans('auth.name')}}:</label>
                            <div class="col-md-6">
                        <input id="name" type="text" class="form-control" name="name"
                        placeholder={{$user-> name }} disabled>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
 <label for="email" class="col-md-4 control-label">{{trans('auth.email')}}:</label>
                            <div class="col-md-6">
                    <input id="email" type="email" class="form-control"
                    placeholder={{$user-> email }}  disabled>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('location') ? ' has-error' : '' }}">
 <label for="location" class="col-md-4 control-label">{{trans('auth.location')}}:</label>
                            <div class="col-md-6">
							{!!  	Form::select('location', ['台灣' => '台灣', 'USA' => 'USA'], $user-> location, ['class'=>'form-control']) !!}
                            @if ($errors->has('location'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('location') }}</strong>
                                    </span>
                           @endif
                            </div>
                        </div>
<br>
                        <div class="form-group">
                            <div class="col-md-2 control-label">
									{!! Form::submit('更新',['class'=>'btn btn-primary form-control']) !!}

                                </button>
                            </div>
                        </div>
					{!! Form::close() !!}
                    @endsection

                @include('widgets.panel', array('as'=>'profile', 'header'=>true,'controls'=>true))
                                </div>
                            </div>
                        </div>
                    @stop
