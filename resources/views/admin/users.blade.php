<head>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
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
		<h3 class="card-title">List of Users</h3>

	</div>
	<div class="card-body">
		<div class="container-fluid">
			<div class="container-fluid">
				@if (session('success'))
				<div class="alert alert-success">
					{{ session('success') }}
				</div>
				@endif
				@if (session('error'))
				<div class="alert alert-danger">
					{{ session('error') }}
				</div>
				@endif
				<table class="table table-bordered table-stripped">
					<thead>
						<tr>
							<th>No</th>
							<th>Full Name</th>
							<th>Email</th>
							<th>Mobile No.</th>
							<th>Gender</th>
							<th>Address</th>
							<th>Profile Photo</th>
							<th>Delete</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$i = 1 ?>
						@foreach($users as $user)

						<tr>
							<td class="text-center"><?php echo $i++; ?></td>
							<td>{{$user->fullname}}</td>
							<td>{{$user->email}}</td>
							<td>{{$user->mobile}}</td>
							<td>{{$user->gender}}</td>
							<td>{{$user->address}}</td>
							<td>
								<details>
									<summary>Photo</summary>
									<img src="{{ asset('uploads/Profile Photo/' . $user->profile_photo) }}" alt="Profile Photo" width="100" height="100">
								</details>
							</td>
							<td>
								<a href="{{ url('/users/user_delete') }}/{{$user->id}}" onclick="return confirm('Are You Sure Package Delete?')" class="btn btn-outline-danger">Delete</a>
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
</script>

@endsection