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
				<a href="<?=base_url()?>AdminController/add"><button type="button" class="btn btn-primary">Delete</button></a>
				<a href="<?=base_url()?>AdminController/view_all_user"><button type="button" class="btn btn-primary">View All User</button></a>
				<div class="card">
					<?php echo validation_errors(); ?>
					<div class="card-header card-header-primary">
						<h4 class="card-title">User Detail</h4>
						<p class="card-category">Add Your Detail</p>
					</div>
					<div class="card-body">
						<?php echo form_open(); ?>
						<form method="post" action="<?=base_url()?>AdminController/add" enctype="multipart/form-data">
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label class="bmd-label-floating">First Name</label>
										<input type="text" class="form-control" name="first_name" >
										<?php echo form_error('first_name', '<div class="error">', '</div>'); ?>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label class="bmd-label-floating">Last Name</label>
										<input type="text" class="form-control" name="last_name"   >
										<?php echo form_error('last_name', '<div class="error">', '</div>'); ?>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label class="bmd-label-floating">Name </label>
										<input type="text" class="form-control" name="name" >
										<?php echo form_error('name', '<div class="error">', '</div>'); ?>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label class="bmd-label-floating">Email </label>
										<input type="email" class="form-control" name="email" >
										<?php echo form_error('email', '<div class="error">', '</div>'); ?>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label class="bmd-label-floating">Contact Number </label>
										<input type="text" class="form-control" name="contact_no" >
										<?php echo form_error('contact_no', '<div class="error">', '</div>'); ?>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label class="bmd-label-floating">Address Detail </label>
										<textarea class="form-control" name="address"  ></textarea>
										<?php echo form_error('address', '<div class="error">', '</div>'); ?>
									</div>
								</div>
								<div class="col-md-12">
									<div class="">
										<label class="bmd-label-floating">Image </label><br>
										<input type="file" name="image" id="image" class="form-group">
									</div>
								</div>

								<div class="col-md-12">
									<div class="form-group">
										<label class="bmd-label-floating">Created By </label>
										<select name="created_by" id="created_by" class="form-control">
											<option value="">Select Created By</option>
											<option value="Admin">Admin</option>
										</select>
										<?php echo form_error('created_by', '<div class="error">', '</div>'); ?>
									</div>
								</div>

								<div class="col-md-12">
									<div class="form-group">
										<label class="bmd-label-floating">Status </label>
										<select name="status" id="status" class="form-control">
											<option value="">Select Status</option>
											<option value="1">Active</option>
											<option value="0">Disactive</option>
										</select>
										<?php echo form_error('status', '<div class="error">', '</div>'); ?>
									</div>
								</div>
							</div>
							<button type="submit" class="btn btn-primary pull-right">Submit &nbsp; Detail</button>
							<div class="clearfix"></div>
						</form>

					</div>
						<?php echo form_close(); ?>
				</div>
			</div>

		</div>
	</div>
</div>
<?php
$this->load->view('layout/footer');
?>
