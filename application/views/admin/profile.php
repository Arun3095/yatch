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
				<div class="card">
					<div class="card-header card-header-primary">
						<h4 class="card-title">Admin Detail</h4>
						<p class="card-category">Update Your Detail</p>
					</div>
					<div class="card-body">
						<form method="post" action="<?=base_url()?>">
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label class="bmd-label-floating">First Name</label>
										<input type="text" class="form-control" name="first_name" required >
										<input type="hidden" name="admin_id" value="<?=$this->session->user_id?>">
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label class="bmd-label-floating">Last Name</label>
										<input type="text" class="form-control" name="last_name" required >
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label class="bmd-label-floating">Name </label>
										<input type="text" class="form-control" name="name" required>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label class="bmd-label-floating">Email </label>
										<input type="email" class="form-control" name="email" required>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label class="bmd-label-floating">Contact Number </label>
										<input type="text" class="form-control" name="contact_no" required>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label class="bmd-label-floating">Address Detail </label>
										<textarea class="form-control" name="address" required></textarea>
										<!-- <input type="text" class="form-control" name="address" > -->
									</div>
								</div>
								<div class="col-md-12">
									<div class="">
										<label class="bmd-label-floating">Image </label><br>
										<input type="file" name="admin_img" id="admin_img">
									</div>
								</div>
							</div>
							<button type="submit" class="btn btn-primary pull-right">Update &nbsp; Detail</button>
							<div class="clearfix"></div>
						</form>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>
<?php
$this->load->view('layout/footer');
?>