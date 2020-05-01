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
				<a href="<?=base_url()?>admin/TourPackage"><button type="button" class="btn btn-primary">View Tour Package List</button></a>
				<div class="card">
					<div class="card-header card-header-primary">
						<h4 class="card-title">Tour Package Detail</h4>
						<p class="card-category">Add Tour Package Detail</p>
					</div>
					<div class="card-body">
						<form method="post" action="<?=base_url()?>admin/TourPackage/add" enctype="multipart/form-data">
							<div class="row">
								<div class="col-md-12">
									<select name="category_id" id="category_id" class="form-control">
										<option value="" selected disabled>---Select Category---</option>
									<?php foreach ($get_tour_category as $category ) { ?>
											<option value="<?=$category->ID?>">&nbsp;<?=$category->title?></option>	
									<?php } ?>
									</select>
								</div>

								<div class="col-md-12">
									<div class="form-group">
										<label class="bmd-label-floating">Name</label>
										<input type="text" class="form-control" name="title" required >
										
									</div>
								</div>


								<div class="col-md-6">
									<div class="form-group">
										<label class="bmd-label-floating">Base Price</label>
										<input type="text" class="form-control" name="base_price" required >
										
									</div>
								</div>


								<div class="col-md-6">
									<div class="form-group">
										<label class="bmd-label-floating">Deal Price</label>
										<input type="text" class="form-control" name="deal_price" required >
										
									</div>
								</div>

								<div class="col-md-12">
									<div class="form-group">
										<label class="bmd-label-floating">Short Description </label>
										<textarea class="form-control" name="short_description"  required></textarea>
									</div>
								</div>

								<div class="col-md-12">
									<div class="form-group">
										<label class="bmd-label-floating">Description </label>
										<textarea class="form-control" name="description"  required></textarea>
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
											<option value="<?=$this->session->user_id?>">Admin</option>
										</select>
									</div>
								</div>

								<div class="col-md-12">
									<div class="form-group">
										<label class="bmd-label-floating">Status </label>
										<select name="status" id="status" class="form-control">
											<option value="" selected disabled>Select Status</option>
											<option value="1">&nbsp;Active</option>
											<option value="0">&nbsp;Inactive</option>
										</select>
									</div>
								</div>
							</div>
							<button type="submit" class="btn btn-primary pull-right">Submit &nbsp; Detail</button>
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
