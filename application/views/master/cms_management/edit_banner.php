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
								<li><a href="<?php echo base_url();?>master/ad_banners"><span>Banner</span></a></li>
								<li class="active"><span>Edit Banner</span></li>
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
									    
									    <form enctype="multipart/form-data" id="edit_banner" method="POST" >
										
										    <div class="row">
										    	<div class="col-md-6">
												<div class="form-wrap">
												
												<input type="hidden" id="primary_id" name="primary_id" value="<?php echo $record['id'];?>">
														<div class="form-group">
															<label for="question" class="control-label mb-10">Title *</label>
															<input value="<?php echo $record['title'];?>" type="text" class="form-control" id="question" placeholder="Enter Title" name="title" required > 
					                                    </div>
					                                    
					                                    	<div class="form-group">
															<label for="question" class="control-label mb-10">Banner Size </label>
															<select class="form-control" name="banner_size"  id="banner_size">
                                                                <option >Select Size</option>
                                    						   <option value="1920*570" <?php if($record['banner_size']=="1920*570"){ echo "selected"; } ?>>1920*570</option>
                                    						   <option value="1170*150" <?php if($record['banner_size']=="1170*150"){ echo "selected"; } ?>>1170*150</option>
                                    						   <option value="570*520" <?php if($record['banner_size']=="570*520"){ echo "selected"; } ?>>570*520</option>
                                    						   <option value="370*145" <?php if($record['banner_size']=="370*145"){ echo "selected"; } ?>>370*145</option>
                                    						
                                    						</select>
					                                    </div>
					                                    
					                                    
					                                    <div class="form-group">
															     <label for="question" class="control-label mb-10">Previous Image</label>
															     
															     <?php if($record['image']!=""){ ?>
													      	     <img src="<?php echo site_url();?>assets/images/banners/<?php echo $record['image']; ?>" style="height:60px; width:100px;"> 
					                                            <?php } ?>
					                                    </div>
					                                    
					                                    
					                                    <div class="form-group">
															    <label for="question" class="control-label mb-10">Image *</label>
													      	    <input type="file" id="exampleInputFile" placeholder=" Choose File..." class="form-control" name="image"  >
													     </div>
					                                    
					                                    
					                                    <div class="form-group">
															     <label for="alt_tag" class="control-label mb-10">Image Alt Tag *</label>
													      	    <input value="<?php echo $record['alt_tag']?>" type="text" class="form-control" id="alt_tag" placeholder="img Alt Tag" required name="alt_tag">
					                                    </div>
					                                    
					                                    
					                                     <div class="form-group">
															    <label for="position" class="control-label mb-10">Position *</label>
													      	    <input type="text" class="form-control" id="position" placeholder="position"value="<?php echo $record['position']?>"  name="position">
					                                    </div>
					                                    
					                                    
					                                    
													
												</div>
											</div>
											
											
										   </div>
										   
										   
										   <div class="col-md-12">
										     <div class="form-group">
													<label for="position" class="control-label mb-10">Description *</label>
													 <textarea id="summernote" class="form-control" name="description"  ><?php echo $record['description'];?></textarea>
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
				

				
			</div>
			<!-- /Main Content -->
			
			<script src="<?php echo base_url();?>assets/ckeditor/ckeditor.js"></script>