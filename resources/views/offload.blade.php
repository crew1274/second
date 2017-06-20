@extends('layouts.dashboard')
@section('title','卸載群組設定')
@section('page_heading','卸載群組設定')
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

<div class="col-sm-6">
	@section ('5button_panel_title','卸載群組')
	@section ('5button_panel_body')
		@foreach($json['control'] as $json)
		@if ($json['available'] == true)
		<h4>群組{{$json['group']}}</h4>
			<p>
	 	    <a class="btn btn-warning" href="{{ url('offload/off/'.$json['group']) }}">
			<i class="fa fa-times"></i></a>
			</p>
			<br>
		@endif
		@endforeach
	@endsection
	@include('widgets.panel', array('as'=>'5button', 'header'=>true))
</div>

<div class="col-sm-6">
@section ('6button_panel_title','非卸載群組')
	@section ('6button_panel_body')
		@foreach($j['control'] as $j)
		@if ($j['available'] == false)
		<h4>群組{{$j['group']}}</h4>
			<p>
	 	    <a class="btn btn-info" href="{{ url('offload/on/'.$j['group']) }}">
			<i class="fa fa-check"></i></a>
			</p>
			<br>
		@endif
		@endforeach
	@endsection
@include('widgets.panel', array('as'=>'6button', 'header'=>true))
</div>

@stop
