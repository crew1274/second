@extends('layouts.dashboard')
@push('css')
<link rel="stylesheet" href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/sweetalert2/6.4.2/sweetalert2.css">
@endpush
@section('title',trans('dashboard.control'))
@section('page_heading',trans('dashboard.control'))
@section('section')

<div class="col-sm-6">
		@section ('5button_panel_title',trans('dashboard.control'))
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

<script>
        $(function() {
        $('#switch5').change(function() 
        {
            $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
                        });

              $.ajax({
                    type :"POST",
                    url: "control/switch",
                    data: { id:5},
        beforeSend:function(response){swal('Wait...');},
        success: function(response) {swal('群組5',response['state'],'success');},
        error: function(response)   {swal('群組5',response['state'],'error');}
                    });
                    })
                    })
</script>

<script>
        $(function() {
        $('#switch6').change(function() 
        {
            $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
                        });

              $.ajax({
                    type :"POST",
                    url: "control/switch",
                    data: { id:6},
        beforeSend:function(response){swal('Wait...');},
        success: function(response) {swal('群組6',response['state'],'success');},
        error: function(response)   {swal('群組6',response['state'],'error');}
                    });
                    })
                    })
</script>

<script>
        $(function() {
        $('#switch7').change(function() 
        {
            $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
                        });

              $.ajax({
                    type :"POST",
                    url: "control/switch",
                    data: { id:7},
        beforeSend:function(response){swal('Wait...');},
        success: function(response) {swal('群組7',response['state'],'success');},
        error: function(response)   {swal('群組7',response['state'],'error');}
                    });
                    })
                    })
</script>

<script>
        $(function() {
        $('#switch8').change(function() 
        {
            $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
                        });

              $.ajax({
                    type :"POST",
                    url: "control/switch",
                    data: { id:8},
        beforeSend:function(response){swal('Wait...');},
        success: function(response) {swal('群組8',response['state'],'success');},
        error: function(response)   {swal('群組8',response['state'],'error');}
                    });
                    })
                    })
</script>

<script>
        $(function() {
        $('#switch9').change(function() 
        {
            $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
                        });

              $.ajax({
                    type :"POST",
                    url: "control/switch",
                    data: { id:9},
        beforeSend:function(response){swal('Wait...');},
        success: function(response) {swal('群組9',response['state'],'success');},
        error: function(response)   {swal('群組9',response['state'],'error');}
                    });
                    })
                    })
</script>

<script>
        $(function() {
        $('#switch10').change(function() 
        {
            $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
                        });

              $.ajax({
                    type :"POST",
                    url: "control/switch",
                    data: { id:10},
        beforeSend:function(response){swal('Wait...');},
        success: function(response) {swal('群組10',response['state'],'success');},
        error: function(response)   {swal('群組10',response['state'],'error');}
                    });
                    })
                    })
</script>

<script>
        $(function() {
        $('#switch11').change(function() 
        {
            $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
                        });

              $.ajax({
                    type :"POST",
                    url: "control/switch",
                    data: { id:11},
        beforeSend:function(response){swal('Wait...');},
        success: function(response) {swal('群組11',response['state'],'success');},
        error: function(response)   {swal('群組11',response['state'],'error');}
                    });
                    })
                    })
</script>

<script>
        $(function() {
        $('#switch12').change(function() 
        {
            $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
                        });

              $.ajax({
                    type :"POST",
                    url: "control/switch",
                    data: { id:12},
        beforeSend:function(response){swal('Wait...');},
        success: function(response) {swal('群組12',response['state'],'success');},
        error: function(response)   {swal('群組12',response['state'],'error');}
                    });
                    })
                    })
</script>

@endpush
