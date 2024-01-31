<!-- Main Content -->
			<div class="page-wrapper">
				<div class="container-fluid">
					<!-- Title -->
					<div class="row heading-bg">
						<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
							<h5 class="txt-dark">Edit Profile</h5>
						</div>
					
						<!-- Breadcrumb -->
						<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
							<ol class="breadcrumb">
								<li><a href="<?php echo base_url();?>master/dashboard">Dashboard</a></li>
								<li><a href="<?php echo base_url();?>master/admin_edit_profile"><span>Edit Profile</span></a></li>
								<li class="active"><span>Edit Profile</span></li>
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
										<h6 class="panel-title txt-dark">Edit Profile</h6>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										
										<div class="row">
											<div class="col-md-6">
												<div class="form-wrap">
												    
												  
													<form enctype="multipart/form-data" id="admin_edit_profile" method="POST" >
														<div class="form-group">
															<label for="inputconf_username" class="control-label mb-10">User Name</label>
															<input type="text" value="<?php echo $user_data['user_name'];?>" class="form-control" name="conf_username"  id="inputconf_username" placeholder="Enter UserName" required>
														</div>
														
														<div class="form-group">
															<label for="inputconf_mobile" class="control-label mb-10">Mobile Number</label>
															<input type="number" value="<?php echo $user_data['mobile'];?>" class="form-control" name="conf_mobile"  id="inputconf_mobile" placeholder="Enter Mobile Number" required>
														</div>
														
														<div class="form-group">
															<label for="inputemail" class="control-label mb-10">Email</label>
															<input type="email" value="<?php echo $user_data['email'];?>" class="form-control" name="email"  id="inputemail" placeholder="Enter Email" required>
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