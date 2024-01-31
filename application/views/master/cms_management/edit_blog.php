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
								<li><a href="<?php echo base_url();?>master/ad_blog"><span>Blog</span></a></li>
								<li class="active"><span>Edit Blog</span></li>
							</ol>
						</div>
					</div>
				
					<div class="row">
						<div class="col-md-12">
							<div class="panel panel-default card-view">
								<div class="panel-heading">
									<div class="pull-left">
										<h6 class="panel-title txt-dark">Edit Blog</h6>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
									    
									    <form enctype="multipart/form-data" id="edit_blog" method="POST" >
									        
									        <input type="hidden" name="primary_id" id="primary_id" value="<?php echo $record['id']?> ?>">
										
										    <div class="row">
										    	<div class="col-md-6">
												<div class="form-wrap">
												
														<div class="form-group">
															<label for="question" class="control-label mb-10">Title *</label>
															<input type="text" required class="form-control" id="question" placeholder="Enter Title" value="<?php echo $record['title']?>" name="title" required > 
					                                    </div>
					                                    
					                                    <div class="form-group">
															<label for="slug" class="control-label mb-10">Slug *</label>
															<input type="text" required class="form-control" id="slug" placeholder="Enter Slug" value="<?php echo $record['slug']?>" name="slug"  > 
					                                    </div>
					                                    
					                                     <div class="form-group">
															<label for="slug" class="control-label mb-10">Service *</label>
															<select name="service" required class="form-control" id="service" > 
															  <option>Select Service</option>
															  <option value="Web Design">Web Design</option>
                                                                <?php 
															  $services=$this->Common_model->CommonRetrivedata('services','*',array('status'=>1),1);	
															  if(!empty($services)){ 
                                                                 foreach($services AS $val){ ?>
															  <option value="<?php echo $val['slug'];?>" <?php if($val['slug']==$val['service']){ echo "selected"; } ?>><?php echo $val['name'];?></option>
                                                                
                                                                <?php 
                                                       }
															  } ?>
															  </select>
					                                    </div>
					                                    
					                                 <?php if($record['image']!=""){ ?>
					                                 
					                                 <div class="form-group">
															     <label for="question" class="control-label mb-10">Previous Image</label>
												<img src="<?php echo site_url();?>assets/images/blog/<?php echo $record['image']?>" style="height:60px; width:100px;"> 
												
												
												<?php } ?>
                                                                
					                                    </div>
					                                    
					                                    
					                                    <div class="form-group">
															     <label for="question" class="control-label mb-10">Image</label>
													      	    <input type="file" id="exampleInputFile" placeholder=" Choose File..." class="form-control" name="image"  >
                                                               
                                                                
					                                    </div>
					                                    
					                                    
					                                    
					                                    <div class="form-group">
															     <label for="alt_tag" class="control-label mb-10">Image Alt Tag *</label>
													      	    <input type="text" class="form-control" id="alt_tag" placeholder="img Alt Tag" required value="<?php echo $record['image_alt']?>" name="image_alt">
					                                    </div>
					                                    
					                                    
					                                     <div class="form-group">
                                        					 <label for="alt_tag" class="control-label mb-10">Button Name</label>
                                        					<input type="text" class="form-control" id="" placeholder="Button Name" value="<?php echo $record['button_name']?>" name="button_name">
                                        				</div>
                                        				
                                        				<div class="form-group">
                                        					 <label for="alt_tag" class="control-label mb-10">Button Link</label>
                                        					<input type="text" class="form-control" id="" placeholder="Button Link" value="<?php echo $record['button_link']?>" name="button_link">
                                        				</div>
              </div>
					                                    
					                                    
					                                   
					                                    
					                                    
					                                    
													
												</div>
											</div>
											
											
										   </div>
										   
										   
										   <div class="col-md-12">
										     <div class="form-group">
															     <label for="position" class="control-label mb-10">Description </label>
													      	    <textarea  id="summernote" class="form-control" name="description"  ><?php echo $record['description'];?></textarea>
					                                    </div>
										 </div>
										
											<div class="form-group mb-0">
												<button value="Submit" name="blog_submit" type="submit" class="btn btn-success btn-anim">Submit</button>
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