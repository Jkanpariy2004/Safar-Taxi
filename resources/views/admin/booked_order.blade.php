<head>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
	<link rel="stylesheet" href="assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
	<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
	<style>
		.alert.alert-danger {
			background-color: transparent;
			padding: 0;
			color: red;
			border: none;
			margin-top: 0px;
			margin-bottom: 0px;
		}

		.alert.alert-danger,
		.alert.alert-success {
			opacity: 0;
			animation: slideIn 0.5s forwards;
			font-weight: 700;
		}

		@keyframes slideIn {
			from {
				opacity: 0;
				transform: translateY(-50px);
			}

			to {
				opacity: 1;
				transform: translateY(0);
			}
		}
	</style>
</head>

@extends('admin.inc.admin_view')
@section('main-content')
<div class="card card-outline card-warning">
	<div class="card-header">
		<h3 class="card-title">List of Taxi Booking</h3>
		<div class="card-tools">
			<!-- <a href="add_city" class="btn btn-flat btn-primary"><span class="fas fa-plus"></span> Create New</a> -->
			<!--<a href="assign_amt" class="btn btn-flat btn-primary"><span class="fas fa-plus"></span>  Assign Amount</a>-->
		</div>
	</div>
	<div class="card-body">
		<div class="container-fluid">
			<div class="container-fluid" style="overflow-x: auto;">
				@if (session('success'))
				<div class="alert alert-success">
					{{ session('success') }}
				</div>
				@endif
				<table id="cabs-table" class="table table-bordered table-stripped">
					<thead>
						<tr>
							<th>No.</th>
							<th>Name</th>
							<th>Mobile</th>
							<th>Email</th>
							<th>Pickup Point</th>
							<th>Pickup Date</th>
							<th>Traveling Root</th>
							<th>Inquiry No.</th>
							<th>Total Km</th>
							<th>Per Km Rate</th>
							<th>Base Fare</th>
							<th>Car Type</th>
							<th>Booked Car</th>
							<th>Pickup Time</th>
							<th>Total Fare</th>
							<th>Delete</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$i = 1 ?>
						@foreach($taxi as $order)
						<tr>
							<td class="text-center"><?php echo $i++; ?></td>
							<td>{{$order->name}}</td>
							<td>{{$order->mobile}}</td>
							<td>{{$order->email}}</td>
							<td>{{$order->pickup_point}}</td>
							<td>{{$order->pickup_date}}</td>
							<td>
								<details>
									<summary>Route</summary>
									{{$order->travel_root}}
								</details>
							</td>
							<td>{{$order->inquiry_no}}</td>
							<td>{{$order->total_km}}</td>
							<td>₹&nbsp;{{$order->per_km_rate}}</td>
							<td>₹&nbsp;{{$order->base_fare}}</td>
							<td>{{$order->car_type}}</td>
							<td>{{$order->available_cabs}}</td>
							<td>{{$order->pickup_time}}</td>
							<td>₹&nbsp;{{$order->total_fare}}</td>
							<td>
								<a href="{{ url('/booked_order/booked_order_delete') }}/{{ $order->id }}" onclick="return confirm('Are You Sure Package Delete?')" class="btn btn-outline-danger">Delete</a>
							</td>
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

	$(document).ready(function() {
		$('#cabs-table').DataTable();
	});
</script>

@endsection