<!-- Main Content -->
			<div class="page-wrapper">
				<div class="container-fluid">
					<!-- Title -->
					<div class="row heading-bg">
						<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
							<h5 class="txt-dark">Web Setting</h5>
						</div>
					
						<!-- Breadcrumb -->
						<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
							<ol class="breadcrumb">
								<li><a href="<?php echo base_url();?>master/dashboard">Dashboard</a></li>
								<li><a href="<?php echo base_url();?>master/ad_web_settings"><span>Web Setting</span></a></li>
								<li class="active"><span>Web Setting</span></li>
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
										<h6 class="panel-title txt-dark">Web Setting</h6>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										
										<div class="row">
											<div class="col-md-6">
												<div class="form-wrap">
													<form enctype="multipart/form-data" id="web_setting" method="POST" >
														<div class="form-group">
															<label for="inputName" class="control-label mb-10">Host Name</label>
															<input type="text" value="<?php echo $record['host_name'];?>" class="form-control" name="host_name"  id="inputName" placeholder="Host Name" required>
														</div>
														
														<div class="form-group">
															<label for="inputlogo" class="control-label mb-10">Logo</label>
															
															<?php if($record['logo']!=""){ ?>
															<img class=" img-responsive mb-10" src="<?php echo site_url();?>assets/images/logo/<?php echo $record['logo'];?>">
															
															<?php } ?>
															<input type="file" class="form-control" name="logo"  id="inputlogo" >
														</div>
														
														<div class="form-group">
															<label for="logo_alt_tag" class="control-label mb-10">Logo Alt tag</label>
															<input value="<?php echo $record['logo_alt_tag'];?>"  type="text" class="form-control" name="logo_alt_tag"  id="logo_alt_tag" >
														</div>
														<div class="form-group">
															<label for="favicon" class="control-label mb-10">Favicon</label>
															<?php if($record['favicon']!=""){ ?>
															<img class=" img-responsive" src="<?php echo site_url();?>assets/images/logo/<?php echo $record['favicon'];?>">
																<?php } ?>
															<input type="file" class="form-control" name="favicon"  id="favicon" >
														</div>
														
														<div class="form-group">
															<label for="mail_template_admin_email" class="control-label mb-10">Mail Template Display Email</label>
															<input value="<?php echo $record['mail_template_admin_email'];?>" type="text" class="form-control" name="mail_template_admin_email"  id="mail_template_admin_email" placeholder="Enter Mail Template Display Email" >
														</div>
															<div class="form-group">
															<label for="mail_template_admin_mobile" class="control-label mb-10">Mail Template Display Mobile</label>
															<input value="<?php echo $record['mail_template_admin_mobile'];?>" type="text" class="form-control" name="mail_template_admin_mobile"  id="mail_template_admin_mobile" placeholder="Enter Mail Template Display Mobile" >
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
					<!-- /Row -->
				</div>
				

				
			<!--</div>-->
			<!-- /Main Content -->