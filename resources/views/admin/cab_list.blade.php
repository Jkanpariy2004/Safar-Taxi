@extends('admin.inc.admin_view')
		@section('main-content')
<div class="card card-outline card-warning">
	<div class="card-header">
		<h3 class="card-title">List of Cabs</h3>
		<div class="card-tools">
			<a href="add_cab" class="btn btn-flat btn-primary"><span class="fas fa-plus"></span>  Create New</a>
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
						<th>Cab Name</th>
						<th>Cab Type</th>
						<th>Cab km</th>
						<th>Cab Base Fare</th>
						<th>Car Capacity</th>
                        <th>Date Created</th>
					</tr>
				</thead>
				<tbody>
                    <?php
                    $i=1?>
                        @foreach($cabs as $cab)

						<tr>
							<td class="text-center"><?php echo $i++; ?></td>
							<td>{{$cab->cars}}</td>
							<td>{{$cab->type}}</td>
							<td>{{$cab->km}}</td>
							<td>{{$cab->base_fare}}</td>
							<td>{{$cab->car_seat}}</td>
							<td>{{$cab->created_at}}</td>
					
						</tr>
                        @endforeach
				</tbody>
			</table>
		</div>
		</div>
	</div>
</div>
<script>
	$(document).ready(function(){
		$('.delete_data').click(function(){
			_conf("Are you sure to delete this cab permanently?","delete_cab",[$(this).attr('data-id')])
		})
        $('.table th, .table td').addClass("align-middle px-2 py-1")
		$('.table').dataTable();
		$('.table').dataTable();
	})
	function delete_cab($id){
		start_loader();
		$.ajax({
			url:_base_url_+"classes/Master.php?f=delete_cab",
			method:"POST",
			data:{id: $id},
			dataType:"json",
			error:err=>{
				console.log(err)
				alert_toast("An error occured.",'error');
				end_loader();
			},
			success:function(resp){
				if(typeof resp== 'object' && resp.status == 'success'){
					location.reload();
				}else{
					alert_toast("An error occured.",'error');
					end_loader();
				}
			}
		})
	}
</script>

@endsection
