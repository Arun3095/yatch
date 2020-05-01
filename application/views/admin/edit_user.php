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
				<div class="confirm-div col-md-12" style="background-color: green;min-height: 30px;color:white;text-align: center;display: none;">
				</div>
				<a href="<?=base_url()?>AdminController/add"><button type="button" class="btn btn-primary">Add User</button></a>
				<div class="card">

					<div class="card-header card-header-primary">
						<h4 class="card-title">Admin Detail</h4>
						<p class="card-category">Update Your Detail</p>
					</div>
					<div class="card-body">
						<?php foreach($users as $users_info) { ?>
							<form method="post" action="<?=base_url()?>AdminController" enctype="multipart/form-data">
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label class="bmd-label-floating">First Name</label>
											<input type="text" class="form-control" name="first_name" value="<?=$users_info->first_name?>" required>
											<input type="hidden" name="user_id" value="<?=$users_info->ID?>">
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label class="bmd-label-floating">Last Name</label>
											<input type="text" class="form-control" name="last_name" value="<?=$users_info->last_name?>" required >
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label class="bmd-label-floating">Name </label>
											<input type="text" class="form-control" name="name" value="<?=$users_info->name?>" required>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label class="bmd-label-floating">Email </label>
											<input type="email" class="form-control" name="email" value="<?=$users_info->email?>" required>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label class="bmd-label-floating">Contact Number </label>
											<input type="text" class="form-control" name="contact_no" value="<?=$users_info->contact_no?>" required>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label class="bmd-label-floating">Address Detail </label>
											<textarea class="form-control" name="address"  required><?=$users_info->address?></textarea>
											<!-- <input type="text" class="form-control" name="address" > -->
										</div>
									</div>
									<div class="col-md-12">
										<div class="">
											<label class="bmd-label-floating">Image </label><br>
											<input type="file" name="image" id="image" class="form-group">
											<img src="<?=base_url()?>uploads/admin/<?=$users_info->image?>" height="70px" width="70px">
										</div>
									</div>
									
									<div class="col-md-12">
										<div class="form-group">
											<label class="bmd-label-floating">Status </label>
											<select name="status" id="status" class="form-control">
												<option value="">Select Status</option>
												<option value="1" <?php if($users_info->status == '1') { ?>selected="selected" <?php } ?>>Active</option>
												<option value="0" <?php if($users_info->status == '0') { ?> selected="selected" <?php  } ?>>Disactive</option>
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
