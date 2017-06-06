@extends ('layouts.plane')
@section('title','Location Information')
@section ('body')
<div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
            <br /><br /><br />
               @section ('location_panel_title','Location Information')
               @section ('location_panel_body')
            @if(isset($location))
            <div class="form-group">
            <h3><label class="text-muted">{{$location->address}}</label></h3>
            </div>
            @endif

                    <form role="form" method="POST" action="{{ url('/location') }}">
                          {{ csrf_field() }}
                            <fieldset>
                                <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                <input class="form-control" placeholder="請輸入所在位置" name="address" type="text" value="{{ old('address') }}" autofocus>
                                </div>
                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                
                                <div class="form-group">
                                  <button type="submit" class="btn btn-primary">
                                  @if(isset($location))
                                  更新
                                  @else
                                  新增
                                  @endif
                                  </button>
                            </fieldset>
                        </form>

            @endsection
            @include('widgets.panel', array('as'=>'location', 'header'=>true,'controls'=>true))
            </div>
        </div>
    </div>
@stop
