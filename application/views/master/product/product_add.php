<!-- Main Content -->
			<div class="page-wrapper">
				<div class="container-fluid">
					<!-- Title -->
					<div class="row heading-bg">
						<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
							<h5 class="txt-dark">Product Add</h5>
						</div>
					
						<!-- Breadcrumb -->
						<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
							<ol class="breadcrumb">
								<li><a href="<?php echo base_url();?>master/dashboard">Dashboard</a></li>
								<li><a href="<?php echo base_url();?>master/product_add"><span>Product Add</span></a></li>
								<li class="active"><span>Product Add</span></li>
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
										<h6 class="panel-title txt-dark">Product Add</h6>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
											<form enctype="multipart/form-data" id="product_edit" method="POST" >
										<div class="row">
											<div class="col-md-6">
												<div class="form-wrap">
												
														<div class="form-group">
															<label for="inputName" class="control-label mb-10">Product Name *</label>
															<input value=""  type="text" class="form-control" name="product_name"  id="inputName" placeholder="Enter product Name" required>
														</div>
														
														<div class="form-group">
															<label for="actual_price" class="control-label mb-10">Actual Price (Rs)</label>
															<input type="number" class="form-control" name="actual_price"  value="" id="actual_price" placeholder="Enter Actual Price (Rs)" >
														</div>
													
												<div class="form-group">
															<label for="weight" class="control-label mb-10">Net weight</label>
															<input value="" type="number" class="form-control" name="weight"  id="weight" placeholder="Enter Net weight" >
														</div>			
										    	
																
															<div class="form-group">
															<label for="out_of_stock" class="control-label mb-10">Out of stock</label>
										<select class="form-control" name="out_of_stock"  id="out_of_stock" >
                    							<option value="">Stock</option>
                    							<option value="Instock" >Instock</option>
                    							<option value="Outstock" >Outstock</option>
                    					</select>
														</div>
														
										<div class="form-group">
											 <label for="brand" class="control-label mb-10">Brand</label>
											 
											 
											<select class="form-control" name="brand_name"  id="brand_name" >
                    						<option disabled>Select Brand</option>
                    							<?php if(count($brand)>0){ 
                    							foreach($brand AS $br){ ?>
                    						    	<option value=""><?php echo $br['brand_name'];?></option>
                    							<?php 
                    							}
                    							}?>
            						</select>
										</div>	
										
										
										<div class="form-group">
											 <label for="brand" class="control-label mb-10">Product Image 1 *</label>
											 
											 <input type="file" id="myFile" accept="image/*" name="product_image1" />
					                    </div>
										
										  
                            	
										
										
								<div class="form-group ">
											 <label for="brand" class="control-label mb-10">Product Image 3</label>
											 
											 <input type="file" id="myFile" accept="image/*" name="product_image3" />
					</div>
					
					
            					
            					
            					<div class="form-group ">
											 <label for="brand" class="control-label mb-10">Product Image 5</label>
											 
											 <input type="file" id="myFile" accept="image/*" name="product_image5" />
					</div>
					
					
            							
										</div>
										
												
											</div>				
												
												
											
											<div class="col-md-6">
											    <div class="form-group">
															<label for="inputslug" class="control-label mb-10">Slug *</label>
															<input  value="" type="text" class="form-control" name="slug"  id="inputslug" required>
														</div>
														
												 <div class="form-group">
															<label for="selling_price" class="control-label mb-10">Selling Price (Rs)</label>
															<input type="number" class="form-control" name="selling_price"  value="" id="selling_price" placeholder="Enter Selling Price (Rs)" >
												</div>
												
												
													<div class="form-group">
															<label for="stocks" class="control-label mb-10">Total Stock</label>
															<input value="" type="number" class="form-control" name="stocks"  id="stocks" placeholder="Enter Stock" >
														</div>
														
														
															<div class="form-group mb-0">
															
												<div class="form-group">
											 <label for="manufacture" class="control-label mb-10">Manufacture</label>
											 <input type="text" class="form-control" id="" placeholder="Enter Manufacture" value="" name="manufacture" >
										</div>	
										
											<div class="form-group">
											 <label for="category" class="control-label mb-10">Category *</label>
											<select class="form-control" name="category"  id="category" required>
                						<option >Select Category</option>
                							<?php if(count($categories)>0){ 
                							foreach($categories AS $cats){ ?>
                							<option value="<?php echo $cats['id'];?>" ><?php echo $cats['category_name'];?></option>
                							<?php 
                							}
                							}?>
					                	</select>
										</div>	
										
										
										<div class="form-group">
											 <label for="brand" class="control-label mb-10">Product Image 2 </label>
											 
											 <input type="file" id="myFile" accept="image/*" name="product_image2" />
					                    </div>
									
										
										
								<div class="form-group ">
											 <label for="brand" class="control-label mb-10">Product Image 4</label>
											 
											 <input type="file" id="myFile" accept="image/*" name="product_image4" />
					</div>
					
									
											
											</div>
										</div>
										
										   <div class="col-md-12">
										       <div class="form-group">
													<label for="inputslug" class="control-label mb-10">Manufacture Address </label>
													<textarea class="form-control" id="summernote" name="manufacture_address" ></textarea>	
												</div>
										   </div>
										   
										   
										    <div class="col-md-12">
										       <div class="form-group">
													<label for="inputslug" class="control-label mb-10">Description </label>
													<textarea id="summernote2" class="form-control" name="description"  ></textarea>
												</div>
										   </div>
									   	<div class="col-md-12">
										       <div class="form-group">
													<label for="inputslug" class="control-label mb-10">Long Description </label>
												<textarea id="summernote3" name="long_description"  ></textarea>
												</div>
										   </div>
									
														</div>
											<button value="Submit" name="web_submit" type="submit" class="btn btn-success btn-anim">Submit</button>
											</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				
				</div>
				

				
			<!--</div>-->
			
			 <script src="<?php echo base_url();?>assets/ckeditor/ckeditor.js"></script>
			<!-- /Main Content -->