<div class="panel panel-{{{ isset($class) ? $class : 'default' }}}">

	@if( isset($header))  
		<div class="panel-heading">
		<h3 class="panel-title">

	@yield ($as . '_panel_title')
	
	@if( isset($controls))  
	<div class="panel-control pull-right">
		<a class="panelButton" href="{{ url()->full() }}"><i class="fa fa-refresh"></i></a>
		<a class="panelButton" href="{{ url()->previous() }}"><i class="fa fa-arrow-circle-left"></i></a>
		<a class="panelButton" href="{{ url('dashboard') }}"s><i class="fa fa-remove"></i></a>
		<!--
		<a class="panelButton" href="{{ url()->full() }}"><i class="fa fa-minus"></i></a>
		<a class="panelButton" href="{{ url()->previous() }}"><i class="fa fa-long-arrow-left "></i></a>
		-->
	</div>
	@endif
	</h3>
	
	</div>
	@endif
	
	<div class="panel-body">
	@yield ($as . '_panel_body')
	</div>

	@if( isset($footer))
	<div class="panel-footer">@yield ($as . '_panel_footer')</div>
	@endif

</div>

