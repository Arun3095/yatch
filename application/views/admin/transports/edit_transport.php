<?php
$this->load->view('layout/sidebar');
$this->load->view('layout/header'); 

if(!$this->session->user_id)
{
return redirect(base_url().'Login/index');
}
?>

<!-- End Navbar -->
<div class="content">
<div class="container-fluid">
<div class="row">
	<div class="col-md-8">
		<div class="confirm-div col-md-12" style="background-color: green;min-height: 30px;color:white;text-align: center;display: none;"></div>
		
		<a href="<?=base_url()?>Transport/view_all_transport"><button type="button" class="btn btn-primary">View List Transport</button></a>
		<div class="card">
			<div class="card-header card-header-primary">
				<h4 class="card-title">Transport Detail</h4>
				<p class="card-category">Add Your Transport Detail</p>
			</div>
			<div class="card-body">
				<?php foreach ($edit_transport_record as $transport) { ?>
					<form method="post" action="<?=base_url()?>admin/Transport/edit_transport_data" enctype="multipart/form-data">
						<div class="row">

							<div class="col-md-12">
								<div class="form-group">
									<label class="bmd-label-floating">Name</label>
									<input type="text" class="form-control" name="name" value="<?= $transport->name?>" required >
									<input type="hidden" name="transport_id" value="<?= $transport->ID ?>">
								</div>
							</div>

							
							<div class="col-md-12">
								<div class="form-group">
									<label class="bmd-label-floating">Description </label>
									<textarea class="form-control" name="description"  required><?= $transport->description?>"</textarea>
								</div>
							</div>
							<div class="col-md-12">
								<div class="">
									<label class="bmd-label-floating">Image </label><br>
									<input type="file" name="image" id="image" class="form-group">
									<img src="<?=base_url()?>uploads/transport/<?=$transport->image?>" height="70px" width="70px">
								</div>
							</div>

							<div class="col-md-12">
								<div class="form-group">
									<label class="bmd-label-floating">Created By </label>
									<select name="created_by" id="created_by" class="form-control">
										<option value="">Select Created By</option>
										<option value="1" <?php if($transport->created_by == '1') { ?>selected="selected" <?php } ?>>Admin</option>
									</select>
								</div>
							</div>
							
							<div class="col-md-12">
								<div class="form-group">
									<label class="bmd-label-floating">Status </label>
									<select name="status" id="status" class="form-control">
										<option value="">Select Status</option>
										<option value="1" <?php if($transport->status == '1') { ?>selected="selected" <?php } ?>>Active</option>
										<option value="0" <?php if($transport->status == '0') { ?> selected="selected" <?php  } ?>>Inactive</option>
									</select>
								</div>
							</div>
						</div>
						<button type="submit" class="btn btn-primary pull-right">Update &nbsp; Detail</button>
						<div class="clearfix"></div>
					</form>
				<?php } ?>
			</div>
		</div>
	</div>

</div>
</div>
</div>
<?php
$this->load->view('layout/footer');
?>
