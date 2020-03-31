<?php 
$this->load->view('layout/sidebar');
$this->load->view('layout/header');
if(! $this->session->user_id)
   {
      return redirect(base_url().'Login/index');
   }
?>

<!-- End Navbar -->
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-8">
				<div class="confirm-div col-md-12" style="background-color: blue;min-height: 30px;color:white;text-align: center;display: none;">

				</div>
				<div class="card">
					<div class="card-header card-header-primary">
						<h4 class="card-title">Change Password</h4>
						<p class="card-category">Change Your Password</p>
					</div>
					<div class="card-body">
						<form method="post" onsubmit="validate(event)" action="<?=base_url()?>Login/change_password">
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label class="bmd-label-floating">Old Password</label>
										<input type="Password" class="form-control" name="old_password" required >
										<input type="hidden" name="user_id" value="<?=$this->session->user_id?>">
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label class="bmd-label-floating">New Password</label>
										<input type="Password" class="form-control" name="new_password" required >
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label class="bmd-label-floating">Confirm Password</label>
										<input type="Password" class="form-control" name="confirm_password" required>
										<span style="color: red;" id="c1">
									</div>
								</div>
							</div>
							<button type="submit" class="btn btn-primary pull-right">Update &nbsp; Password</button>
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
<script type="text/javascript">
	/*--------------------Validate Check Password Confirm-----------------------*/

	function validate(event)
	{
		alert(event);
		new_pass = document.getElementById('new_password').value;
		confirm_pass = document.getElementById('confirm_password').value;
		
		if(new_pass != confirm_pass)
		{
			document.getElementById('c1').innerHTML = "Please Enter Confirm Password Same as Above";
			event.preventDefault();
		}
	}
	/*---------------------------Display Msg----------------------*/
	$(document).ready(function() {
		<?php if($this->session->flashdata('msg')){ ?>
			$('.confirm-div').html('<?php echo $this->session->flashdata('msg'); ?>').show();
			$('.confirm-div').delay(3000).fadeOut();
		<?php } ?>
	});
</script>