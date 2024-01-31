<!-- Main Content -->
			<div class="page-wrapper">
				<div class="container-fluid">
					<!-- Title -->
					<div class="row heading-bg">
						<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
							<h5 class="txt-dark">Product Import</h5>
						</div>
					
						<!-- Breadcrumb -->
						<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
							<ol class="breadcrumb">
								<li><a href="<?php echo base_url();?>master/dashboard">Dashboard</a></li>
								<li><a href="<?php echo base_url();?>master/ad_product_listing"><span>Product</span></a></li>
								<li class="active"><span>Product Import</span></li>
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
										<h6 class="panel-title txt-dark">Product Import</h6>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
											<form enctype="multipart/form-data" id="import_product" method="POST" >
										<div class="row"><
											<div class="col-md-6">
												<div class="form-wrap">
												
														<div class="form-group">
															<label for="inputName" class="control-label mb-10">Upload File *</label>
															 <input name="file" type="file" id="exampleInputFile" placeholder=" Choose File..." class="form-control" required>
														</div>
														
									
											
										</div>
										
												
											</div>				
												
												
											
											<div class="col-md-6">
											  
												
														</div>
														
										<label for="inputName" style="margin-top:25px;"></label>
											<button value="Submit" name="import_product" type="submit" class="btn btn-success btn-anim">Submit</button>
										
									</div>
									
									</form>
								</div>
							</div>
						</div>
					</div>
				
				</div>
				

				
			</div>
			