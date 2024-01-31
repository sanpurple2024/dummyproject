<!-- Main Content -->
			<div class="page-wrapper">
				<div class="container-fluid">
					<!-- Title -->
					<div class="row heading-bg">
						<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
							<h5 class="txt-dark">Change Password</h5>
						</div>
					
						<!-- Breadcrumb -->
						<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
							<ol class="breadcrumb">
								<li><a href="<?php echo base_url();?>master/dashboard">Dashboard</a></li>
								<li><a href="<?php echo base_url();?>master/change_password"><span>Change Password</span></a></li>
								<li class="active"><span>Change Password</span></li>
							</ol>
						</div>
						<!-- /Breadcrumb -->
					
					</div>
					<!-- /Title -->
					
					<!-- Row -->
					<div class="row">
						<div class="col-md-12">
							<div class="panel panel-default card-view">
								<div class="panel-heading">
									<div class="pull-left">
										<h6 class="panel-title txt-dark">Change Password</h6>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										
										<div class="row">
											<div class="col-md-6">
												<div class="form-wrap">.
													<form enctype="multipart/form-data" id="change_password" method="POST" >
													  <input type="hidden" name="user_id" id="user_id" value="<?php echo $id;?>">
														<div class="form-group">
															<label for="inputnew_pwd" class="control-label mb-10">New Password</label>
															<input type="password" value="" class="form-control" name="new_pwd"  id="inputnew_pwd" placeholder="Enter New Password" required>
														</div>
														
														<div class="form-group">
															<label for="inputconf_pwd" class="control-label mb-10">Confirm Password</label>
															<input type="password" value="" class="form-control" name="conf_pwd"  id="inputconf_pwd" placeholder="Enter Confirm Password" required>
														</div>
														
													
													
														<div class="form-group mb-0">
															<button value="Submit" name="web_submit" type="submit" class="btn btn-success btn-anim">Submit</button>
														</div>
													</form>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				
				</div>
				

				
			<!--</div>-->
			<!-- /Main Content -->