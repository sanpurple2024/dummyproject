<!-- Main Content -->
			<div class="page-wrapper">
				<div class="container-fluid">
					<!-- Title -->
					<div class="row heading-bg">
						<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
							<h5 class="txt-dark">Edit CMS Page</h5>
						</div>
					
						<!-- Breadcrumb -->
						<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
							<ol class="breadcrumb">
								<li><a href="<?php echo base_url();?>master/dashboard">Dashboard</a></li>
								<li><a href="<?php echo base_url();?>master/add_category"><span>Edit CMS Page</span></a></li>
								<li class="active"><span>Edit CMS Page</span></li>
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
										<h6 class="panel-title txt-dark">Edit CMS Page</h6>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
									    
									    <form enctype="multipart/form-data" id="edit_cms_page" method="POST" >
									        
									        
										
										
										<input type="hidden" id="primary_id" value="<?php echo $id;?>">
												
												
												
										    <div class="row">
										    	<div class="col-md-6">
												<div class="form-wrap">
												    
												  
														<div class="form-group">
															<label for="heading" class="control-label mb-10">Heading *</label>
															<input type="text" class="form-control" id="heading" placeholder="Enter Heading" value="<?php echo $record['page_name']?>" name="page_name" required=""  >
					                                         
					                                    </div>
					                                    
					                                    
					                                    <?php if($record['image']!=""){ ?>
					                                    <div class="form-group">
															<label for="exampleInputFile" class="control-label mb-10">Present Image</label>
															<img src="<?php echo site_url();?>assets/images/about/<?php echo $record['image']?>" style="height:60px; width:100px;"> 
														</div>
														
												    <?php } ?>
												
												
														<div class="form-group">
															<label for="exampleInputFile" class="control-label mb-10">Image</label>
															<input type="file" id="exampleInputFile" placeholder=" Choose File..." class="form-control" name="image">
														</div>
													
													
													
												</div>
											</div>
											
											
										   </div>
										   
										   
										   <div class="col-md-12">
											    <div class="form-group">
													<label for="exampleInputFile" class="control-label mb-10">Content</label>
												    <textarea id="summernote" name="content"  required ><?php echo $record['content'];?></textarea>
												</div>
											</div>
										
										
											<div class="form-group mb-0">
												<button value="Submit" name="cms_pages_submit" type="submit" class="btn btn-success btn-anim">Submit</button>
											</div>
										</form>
													
													
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /Row -->
				</div>
				

				
			</div>
			<!-- /Main Content -->
			
			
			 <script src="<?php echo base_url();?>assets/ckeditor/ckeditor.js"></script>