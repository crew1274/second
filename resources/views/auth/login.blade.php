@extends ('layouts.plane')
@section('title',trans('auth.login'))
@section ('body')
<div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
            <br /><br /><br />
               @section ('login_panel_title',trans('auth.please'))
               @section ('login_panel_body')
                    <form role="form" method="POST" action="{{ url('/login') }}">
                          {{ csrf_field() }}
                            <fieldset>
                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <input class="form-control" placeholder="{{ trans('auth.email') }}" name="email" type="email" value="{{ old('email') }}" autofocus>
                                </div>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <input class="form-control" placeholder="{{ trans('auth.password') }}" name="password" type="password" value="">
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>


                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">{{ trans('auth.rememberme') }}
                                    </label>
                                </div>
                                <div class="form-group">
                                  <button type="submit" class="btn btn-primary">
                                      <i class="fa fa-btn fa-sign-in"></i> {{trans('auth.login')}}
                                  </button>
                                  <a class="btn btn-link" href="{{ url('/password/reset') }}">
                                      {{ trans('auth.forget') }}
                                  </a>
                            </fieldset>
                        </form>

                @endsection
                @include('widgets.panel', array('as'=>'login', 'header'=>true))
            </div>
        </div>
    </div>
@stop
