@extends('layouts.dashboard')
@push('css')
<link rel="stylesheet" href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/sweetalert2/6.4.2/sweetalert2.css">
@endpush
@section('title','即時控制')
@section('page_heading','即時控制')
@section('section')

<div class="col-sm-6">
		@section ('5button_panel_title','簡易控制')
		@section ('5button_panel_body')

		@foreach($json['control'] as $json)
		@if ($json['available'] == 1)
		@if ($json['boolean'] == true)
		<div class="checkbox">
  			<label >
    			<input  id= {{ 'switch'.$json['group'] }} type="checkbox" checked data-toggle="toggle" data-width="100" >
    				Group {{$json['group']}}
  			</label>
		</div>
		<label id={{ 'success'.$json['group'] }}  class="text-info" ></label>
		@else
    	<div class="checkbox">
  			<label >
    			<input  id= {{ 'switch'.$json['group'] }} type="checkbox" data-toggle="toggle" data-width="100" >
    				Group {{$json['group']}}
  			</label>
		</div>
		<label id={{ 'success'.$json['group'] }}  class="text-info" ></label>
		@endif
		@else
		<div class="checkbox disabled">
  			<label>
    			<input type="checkbox" disabled data-toggle="toggle" data-width="100">
    				Group {{$json['group']}}
  			</label>
		</div>
		<label id={{ 'success'.$json['group'] }}  class="text-info" ></label>
		@endif
		@endforeach
		@endsection
		@include('widgets.panel', array('as'=>'5button', 'header'=>true))
</div>

@stop

@push('javascript')
<script src="https://cdn.jsdelivr.net/sweetalert2/6.4.2/sweetalert2.js"></script>
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

<script>
        $(function() {
        $('#switch1').change(function() 
        {
            $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
                        });

              $.ajax({
                    type :"POST",
                    url: "control/switch",
                    data: { id:1},
        beforeSend:function(response){swal('Wait...');},
        success: function(response) {swal('群組1',response['state'],'success');},
        error: function(response)   {swal('群組1',response['state'],'error');}
                    });
                    })
                    })
</script>

<script>
        $(function() {
        $('#switch2').change(function() 
        {
            $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
                        });

              $.ajax({
                    type :"POST",
                    url: "control/switch",
                    data: { id:2},
        beforeSend:function(response){swal('Wait...');},
        success: function(response) {swal('群組2',response['state'],'success');},
        error: function(response)   {swal('群組2',response['state'],'error');}
                    });
                    })
                    })
</script>

<script>
        $(function() {
        $('#switch3').change(function() 
        {
            $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
                        });

              $.ajax({
                    type :"POST",
                    url: "control/switch",
                    data: { id:3},
        beforeSend:function(response){swal('Wait...');},
        success: function(response) {swal('群組3',response['state'],'success');},
        error: function(response)   {swal('群組3',response['state'],'error');}
                    });
                    })
                    })
</script>

<script>
        $(function() {
        $('#switch4').change(function() 
        {
            $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
                        });

              $.ajax({
                    type :"POST",
                    url: "control/switch",
                    data: { id:4},
        beforeSend:function(response){swal('Wait...');},
        success: function(response) {swal('群組4',response['state'],'success');},
        error: function(response)   {swal('群組4',response['state'],'error');}
                    });
                    })
                    })
</script>
@endpush