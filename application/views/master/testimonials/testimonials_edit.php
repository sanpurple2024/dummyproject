<!-- Main Content -->
			<div class="page-wrapper">
				<div class="container-fluid">
					<!-- Title -->
					<div class="row heading-bg">
						<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
							<h5 class="txt-dark">Edit </h5>
						</div>
					
						<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
							<ol class="breadcrumb">
								<li><a href="<?php echo base_url();?>master/dashboard">Dashboard</a></li>
								<li><a href="<?php echo base_url();?>master/ad_testimonials_listing"><span>Testimonials</span></a></li>
								<li class="active"><span>Add testimonials</span></li>
							</ol>
						</div>
					
					</div>
				
					<div class="row">
						<div class="col-md-12">
							<div class="panel panel-default card-view">
								<div class="panel-heading">
									<div class="pull-left">
										<h6 class="panel-title txt-dark">Edit Banners</h6>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
									    
									    <form enctype="multipart/form-data" id="edit_testimonial" method="POST" >
									        
									        
									        <input type="hidden" name="primary_id" id="primary_id" value="<?php echo $record['id'];?>">
										
										    <div class="row">
										    	<div class="col-md-12">
												<div class="form-wrap">
												
														<div class="form-group">
															<label for="question" class="control-label mb-10">Client Name *</label>
														<input type="text" class="form-control" id="" value="<?php echo $record['client_name'];?>"  placeholder="Client name" name="client_name" required=""  required>
					
					                                    </div>
					                                    
					                                    	<div class="form-group">
															<label for="question" class="control-label mb-10">Banner Size </label>
														
					                                    </div>
					                                    
					                                    
					                                    <div class="form-group">
															     <label for="question" class="control-label mb-10">Client Message </label>
														<textarea id="summernote" name="client_message" ><?php echo $record['client_message']?></textarea>
                                                                
					                                    </div>
					                                 
					                                    
					                                    
					                                    
													
												</div>
											</div>
											
										   </div>
								
										
											<div class="form-group mb-0">
												<button value="Submit" name="banner_submit" type="submit" class="btn btn-success btn-anim">Submit</button>
											</div>
										</form>	
													
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /Row -->
				</div>
				

				
			<!--</div>-->
			<!-- /Main Content -->
			
			<script src="<?php echo base_url();?>assets/ckeditor/ckeditor.js"></script>