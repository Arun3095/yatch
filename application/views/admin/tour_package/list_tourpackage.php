<?php
$this->load->view('layout/sidebar');
$this->load->view('layout/header'); 
if(!$this->session->user_id)
{
	return redirect(base_url().'Login/index');
}
?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">

<div class="content">
	<div class="confirm-div col-md-12" style="background-color: green;min-height: 30px;color:white;text-align: center;display: none;">
	</div>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<button type="button" name="delete_all" id="delete_all" class="btn btn-primary" onclick="return confirm('Are You Sure You Want to Delete All Entry')">Delete</button>
				<a href="<?=base_url()?>admin/TourPackage/add"><button type="button" class="btn btn-primary">Add Tour Package</button></a>
				<button type="button" name="active" id="active" class="btn btn-primary" onclick="active()">Active</button>
				<button type="button" name="inactive" id="inactive" class="btn btn-primary" onclick="disactive()">Inactive</button>
				<div class="card card-plain">
					<div class="card-header card-header-primary">
						<h4 class="card-title mt-0">List Of Tour Package</h4>
						<p class="card-category">Here is a All Packages </p>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-hover" id="example" width="100%">
								<thead>
									<tr>
										<th><input id="selectAll" type="checkbox" name="selectAll">Select All</th>
										<th>Title</th>
										<th>Description</th>
										<th>Image</th>
										<th>Status</th>
										<th>Action</th>
									</tr>
									</thead>
										<?php $i = 1; foreach ($list_tour_package as $tourpackage ) { ?>
											<tbody>
												<tr>
													<td><input type="checkbox" class="delete_checkbox" value="<?=$tourpackage->ID; ?>"></td>
													<td><?=$tourpackage->title ?></td>
													<td><?=$tourpackage->description ?></td>
													<td><img src="<?=base_url()?>uploads/tour_package/<?=$tourpackage->image ?>" height="70px" width="70px"></td>
													<td><?php if($tourpackage->status == '1') { echo "<p style='color:limegreen'><b>Active</b></p>"; } else { echo "<p style='color:#FF9633'><b>Inactive</b></p>"; } ?>
													<input type="hidden" name="status_val" id="status_val" value="<?=$tourpackage->status?>">
												</td>
													<td><a href="<?=base_url()?>admin/TourPackage/edit_tourpackage_data?edit_id=<?=$this->encryption->encrypt($tourpackage->ID)?>">Edit</a>
													<a href="<?=base_url()?>admin/TourPackage/delete_tourpackage?delete_id=<?=$this->encryption->encrypt($tourpackage->ID)?>" onclick="return confirm('Are You Sure You Want to Delete This Entry')">Delete</a>
													</td>
												</tr>
											</tbody>
										<?php } ?>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
		$this->load->view('layout/footer');
		?>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
    $('#example').DataTable();
} );
</script>

<!-- <style>
.removeRow
{
 background-color: #FF0000;
    color:#000000;
}
</style> -->
<script>
$(document).ready(function(){
 
 $('.delete_checkbox').click(function(){
  if($(this).is(':checked'))
  {
   $(this).closest('tr').addClass('removeRow');
  }
  else
  {
   $(this).closest('tr').removeClass('removeRow');
  }
 });

 $('#delete_all').click(function(){
  var checkbox = $('.delete_checkbox:checked');
  if(checkbox.length > 0)
  {
   var checkbox_value = [];
   $(checkbox).each(function(){
    checkbox_value.push($(this).val());
   });

   /*Function Sent Request To delete Selected Items*/
   $.ajax({
    url:"<?php echo base_url(); ?>admin/TourPackage/delete_all",
    method:"POST",
    data:{checkbox_value:checkbox_value},
    success:function()
    {
     $('.removeRow').fadeOut(1500);
    }
   })
  }
  else
  {
   alert('Select atleast One Records');
  }
 });

});


/*Update Status */

 /*Select All*/
	$("#selectAll").click(function(){
		$("input[type=checkbox]").prop('checked', $(this).prop('checked'));

	});
	/*End Here*/
	function active()
	{
		var status = $('.delete_checkbox:checked');
		var status_record = $("#status_val").val();
		if(status.length > 0)
		{
			var status_value = [];
			$(status).each(function(){
				status_value.push($(this).val());
			});

			/*Function Sent Request To delete Selected Items*/
			$.ajax({
				url:"<?php echo base_url(); ?>admin/TourPackage/update_active",
				method:"POST",
				data:{status_value:status_value , status_record:status_record},
				success:function(result)
				{
					location.reload(1000);
				}
			})
		}
		else
		{
			alert('Select atleast One Records');
		}
	}

	/*Inactive*/
	function disactive()
	{
		var status = $('.delete_checkbox:checked');
		var status_record = $("#status_val").val();
		if(status.length > 0)
		{
			var status_value = [];
			$(status).each(function(){
				status_value.push($(this).val());
			});

			/*Function Sent Request To delete Selected Items*/
			$.ajax({
				url:"<?php echo base_url(); ?>admin/TourPackage/update_disactive",
				method:"POST",
				data:{status_value:status_value , status_record:status_record},
				success:function(result)
				{
					location.reload(1000);
				}
			})
		}
		else
		{
			alert('Select atleast One Records');
		}
	}
	/*End Here*/


</script>

