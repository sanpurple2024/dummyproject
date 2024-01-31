<!-- Main Content -->
			<div class="page-wrapper">
				<div class="container-fluid">
					<!-- Title -->
					<div class="row heading-bg">
						<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
							<h5 class="txt-dark">Edit Sub-Category</h5>
						</div>
					
						<!-- Breadcrumb -->
						<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
							<ol class="breadcrumb">
								<li><a href="<?php echo base_url();?>master/dashboard">Dashboard</a></li>
								<li><a href="<?php echo base_url();?>master/sub_categories_edit"><span>Edit Sub-Category</span></a></li>
								<li class="active"><span>Edit Sub-Category</span></li>
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
										<h6 class="panel-title txt-dark">Edit Sub-Category</h6>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										
										<div class="row">
											<div class="col-md-6">
												<div class="form-wrap">
													<form enctype="multipart/form-data" id="edit_subcategory" method="POST" >
													    
													    
													     
					                                    <input type="hidden" name="primary_id" id="primary_id" value="<?php echo $record['id'];?>">
					                                    
					                                    
					                                    
														<div class="form-group">
										<label for="category_name" class="control-label mb-10">Select Category *</label>
										<select id="category_id" class="form-control" required name="category_id"> 
                                		<option>Select Category</option>
                                					      
                                			<?php if(count($categories)>0){
                                			 foreach($categories AS $cat){ ?>
                                	 <option  value="<?php echo $cat['id']; ?>" <?php if($cat['id']==$record['category_id']){ ?> selected <?php } ?>><?php echo $cat['category_name'];?></option>
                                					      <?php 
                                			 }
                                		} ?>
                                					    </select>
					                                    </div>
					                                    
					                                    
					                                    <div class="form-group">
															<label for="category_name" class="control-label mb-10">Sub Category Name *</label>
															<input type="text" class="form-control" value="<?php echo $record['sub_cat_name'];?>" id="" placeholder="Sub Category Name" name="sub_cat_name" required=""  >
					                                    </div>
														
														
														<div class="form-group">
															<label for="inputlogo" class="control-label mb-10">Slug *</label>
											<input type="text" class="form-control" id="inputlogo" value="<?php echo $record['sub_cat_slug'];?>" placeholder="Slug" name="slug" required=""  >
														</div>
														
														<div class="form-group mb-30">
															<label for="logo_alt_tag" class="control-label mb-10">Display Order *</label>
														     <input type="text" class="form-control" id="logo_alt_tag" placeholder="Display Order" value="<?php echo $record['display_order'];?>" name="display_order" required=""  >
														</div>
														
														
													<button type="submit" class="btn btn-success btn-anim"><i class="icon-rocket"></i><span class="btn-text">Submit</span></button>
													
														<!--<div class="form-group mb-0">-->
														<!--	<button value="Submit" name="subcategory_submit" type="submit" class="btn btn-success btn-anim">Submit</button>-->
														<!--</div>-->
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