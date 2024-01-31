<!-- Main Content -->
			<div class="page-wrapper">
				<div class="container-fluid">
					<!-- Title -->
					<div class="row heading-bg">
						<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
							<h5 class="txt-dark">Add Category</h5>
						</div>
					
						<!-- Breadcrumb -->
						<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
							<ol class="breadcrumb">
								<li><a href="<?php echo base_url();?>master/dashboard">Dashboard</a></li>
								<li><a href="<?php echo base_url();?>master/category_list"><span>Category</span></a></li>
								<li class="active"><span>Add Category</span></li>
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
										<h6 class="panel-title txt-dark">Add Category</h6>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										
										<div class="row">
											<div class="col-md-6">
												<div class="form-wrap">
													<form enctype="multipart/form-data" id="add_category" method="POST" >
														<div class="form-group">
															<label for="category_name" class="control-label mb-10">Category Name *</label>
															<input type="text" class="form-control" id="category_name" placeholder="Category Name" name="category_name" required=""  >
					                                   
					                                             Note: 1. Please dont use special character like as <>@!#$%^&*()_+[]{}?:;|'\"\\,./~`-= <br/>
					                                    </div>
														
														<div class="form-group">
															<label for="inputlogo" class="control-label mb-10">Slug *</label>
															<input type="text" class="form-control" id="inputlogo" value="<?php //echo uniqid();?>" placeholder="Slug" name="slug" required=""  >
														</div>
														
														<div class="form-group">
															<label for="logo_alt_tag" class="control-label mb-10">Display Order *</label>
														     <input type="text" class="form-control" id="logo_alt_tag" placeholder="Display Order" name="display_order" required=""  >
														</div>
														<div class="form-group mb-30">
															<label for="exampleInputFile" class="control-label mb-10">Image *</label>
															<input type="file" id="exampleInputFile" placeholder=" Choose File..." class="form-control" required name="images">
														</div>
													
														<!--<div class="form-group mb-0">-->
														<!--	<button value="Submit" name="web_submit" type="submit" class="btn btn-success btn-anim">Submit</button>-->
														<!--</div>-->
														<button type="submit" class="btn btn-success btn-anim"><i class="icon-rocket"></i><span class="btn-text">Submit</span></button>
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