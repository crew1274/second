@extends('layouts.dashboard')
@section('title','Table')
@section('page_heading','Table')

@section('section')
<div class="row">
	<div class="col-sm-12">
		@section ('cotable_panel_title','目前設定')
		@section ('cotable_panel_body')
		<p><a href="{{ url('/config') }}">Add new config</a></p>

		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Name</th>
					<th>Email</th>
					<th>Address</th>
				</tr>
			</thead>
			<tbody>
				<tr class="success">
					<td>John</td>
					<td>john@gmail.com</td>
					<td>London, UK</td>
				</tr>
				<tr>
					<td>Wayne</td>
					<td>wayne@gmail.com</td>
					<td>Manchester, UK</td>
				</tr>
				<tr class="info">
					<td>Andy</td>
					<td>andy@gmail.com</td>
					<td>Merseyside, UK</td>
				</tr>
				<tr>
					<td>Danny</td>
					<td>danny@gmail.com</td>
					<td>Middlesborough, UK</td>
				</tr>
				<tr class="warning">
					<td>Frank</td>
					<td>frank@gmail.com</td>
					<td>Southampton, UK</td>
				</tr>
				<tr>
					<td>Scott</td>
					<td>scott@gmail.com</td>
					<td>Newcastle, UK</td>
				</tr>
				<tr class="danger">
					<td>Rickie</td>
					<td>rickie@gmail.com</td>
					<td>Burnley, UK</td>
				</tr>
			</tbody>
		</table>
		@endsection
		@include('widgets.panel', array('header'=>true, 'as'=>'cotable'))
	</div>
</div>
</div>

<table class="table table-bordered" id="users-table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
				<th>created_at</th>
				<th>updated_at</th>
            </tr>
        </thead>
    </table>
	@stop
	@push('scripts')
<script>
$(function() {
    $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('datatables.data') !!}',
        columns: [
            { data: 'code', name: 'code' },
            { data: 'nmodel', name: 'model' },
            { data: 'created_at', name: 'created_at' },
            { data: 'updated_at', name: 'updated_at' }
        ]
    });
});
</script>
@endpush
@stop
