@extends('admin.inc.admin_view')
@section('main-content')
<div class="card card-outline card-warning">
	<div class="card-header">
		<h3 class="card-title">List of City</h3>
		<div class="card-tools">
			<a href="assign_amt" class="btn btn-flat btn-primary"><span class="fas fa-plus"></span> Assign Amount</a>
		</div>
	</div>
	<div class="card-body">
		<div class="container-fluid">
			<div class="container-fluid">
				<table class="table table-bordered table-stripped">
					<colgroup>
						<col width="5%">
						<col width="15%">
						<col width="15%">
						<col width="15%">
						<col width="25%">
						<col width="10%">
						<col width="15%">
					</colgroup>
					<thead>
						<tr>
							<th>#</th>
							<th>From </th>
							<th>To</th>
							<th>Hatchback</th>
							<th>Sedan</th>
							<th>Suv</th>
							<th>Delete</th>
							<th>Edit</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$i = 1 ?>
						@foreach($datas as $data)

						<tr>
							<td class="text-center"><?php echo $i++; ?></td>
							<td>{{$data->city}}</td>
							<td>{{$data->to}}</td>
							<td>{{$data->hatchback}}</td>
							<td>{{$data->sedan}}</td>
							<td>{{$data->suv}}</td>
							<td><a class="btn btn-outline-danger" href="oneway_delete/{{$data->id}}">Delete</a></td>
							<td><a class="btn btn-outline-danger" href="oneway_edit?id={{$data->id}}">Edit</a></td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<script>
	$(document).ready(function() {
		$('.delete_data').click(function() {
			_conf("Are you sure to delete this cab permanently?", "delete_cab", [$(this).attr('data-id')])
		})
		$('.table th, .table td').addClass("align-middle px-2 py-1")
		$('.table').dataTable();
		$('.table').dataTable();
	})

	function delete_cab($id) {
		start_loader();
		$.ajax({
			url: _base_url_ + "classes/Master.php?f=delete_cab",
			method: "POST",
			data: {
				id: $id
			},
			dataType: "json",
			error: err => {
				console.log(err)
				alert_toast("An error occured.", 'error');
				end_loader();
			},
			success: function(resp) {
				if (typeof resp == 'object' && resp.status == 'success') {
					location.reload();
				} else {
					alert_toast("An error occured.", 'error');
					end_loader();
				}
			}
		})
	}
</script>

@endsection