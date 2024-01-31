<!-- Main Content -->
			<div class="page-wrapper">
				<div class="container-fluid">
					<!-- Title -->
					<div class="row heading-bg">
						<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
							<h5 class="txt-dark">Edit</h5>
						</div>
					
						<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
							<ol class="breadcrumb">
								<li><a href="<?php echo base_url();?>master/dashboard">Dashboard</a></li>
								<li><a href="<?php echo base_url();?>master/ad_customer_listing"><span>Customer</span></a></li>
								<li class="active"><span>Edit Customer</span></li>
							</ol>
						</div>
					
					</div>
				
					<div class="row">
						<div class="col-md-12">
							<div class="panel panel-default card-view">
								<div class="panel-heading">
									<div class="pull-left">
										<h6 class="panel-title txt-dark">Edit Customer</h6>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
									    
									    <form enctype="multipart/form-data" id="edit_customer" method="POST" >
										
										    <div class="row">
										    	<div class="col-md-6">
												<div class="form-wrap">
												
														<div class="form-group">
															<label for="question" class="control-label mb-10">Customer Name *</label>
														<input value="<?php echo $record['name'];?>" type="text" class="form-control" id="" placeholder="Customer name" name="customer_name" required=""  >
					                                         
					                                    </div>
					                                    
					                                    <div class="form-group">
															<label for="answer" class="control-label mb-10">Email *</label>
													<input value="<?php echo $record['email'];?>" type="email" class="form-control" id="" placeholder="Email" name="email" required>
					                                    </div>
					                                    
					                                    
					                                    
					                        <div class="form-group">
													<label for="answer" class="control-label mb-10">Mobile *</label>
												<input value="<?php echo $record['mobile'];?>" type="number" class="form-control" id="" placeholder="Mobile" name="mobile" required=""  >
					                       </div>
					                       
					                       
					                        <div class="form-group">
													<label for="answer" class="control-label mb-10">From Referal Code (e.g : e4567 Allowed only five digit) </label>
												<input value="<?php echo $record['from_referal_code'];?>" type="number" class="form-control" id="" placeholder="From referal Code" name="from_referal_code" >
					                       </div>
					                       
					                       
					                       
					                       <div class="form-group">
													<label for="answer" class="control-label mb-10">Gender *</label>
													
													
        									<select class="form-control" name="gender"  id="gender" required>
                					   	 <option disabled>Select Gender</option>
                						
                							<option value="Male" <?php if($record['gender']=="Male"){ echo "selected"; } ?>>Male</option>
                							<option value="Female" <?php if($record['gender']=="Female"){ echo "selected"; } ?>>Female</option>
                						</select>
											
					                       </div>
					                       
					                       
					                       
					                       
					            <div class="form-group">
											<label for="answer" class="control-label mb-10">Country</label>
													
        								<select class="form-control" name="country" id="country" required >
            						        <option>Select Country</option>
            							<?php if(count($country)>0){ 
            							foreach($country AS $coun){ ?>
            							<option value="<?php echo $coun['country_name'];?>" <?php if($coun['country_name']==$record['country']){ echo "selected"; } ?>><?php echo $coun['country_name'];?></option>
            							<?php 
            							}
            							}?>
            						</select>
											
					                       </div>
					                       
					                       
					                       
					            <div class="form-group" id="state_wrp">
											<label for="answer" class="control-label mb-10">State *</label>
													
													
        								<div id="state">
        								    <select class="form-control" name="state"  id="state_change" data-parsley-required="true" data-parsley-required-message="State is Required">
            						<option >Select State</option>
            							<?php if(count($state)>0){ 
            							foreach($state AS $coun){ ?>
            							<option value="<?php echo $coun['state_name'];?>" <?php if($coun['state_name']==$record['state']){ echo "selected"; } ?>><?php echo $coun['state_name'];?></option>
            							<?php 
            							}
            							}?>
            						</select>
        								</div>
											
					           </div>
					           
					           
					           <div class="form-group" id="city_wrp">
											<label for="answer" class="control-label mb-10">City *</label>
											
											<div id="city">
											      <select class="form-control" name="city"  id="city_change" data-parsley-required="true" data-parsley-required-message="City is Required">
                    						<option >Select City</option>
                    							<?php if(count($city)>0){ 
                    							foreach($city AS $coun){  ?>
                    							<option value="<?php echo $coun['city_name'];?>" <?php if($coun['city_name']==$record['city']){ echo "selected"; } ?>><?php echo $coun['city_name'];?></option>
                    							<?php 
                    							}
                    							}?>
                    						</select>
											    
											    
											</div>
													
													
        								
											
					           </div>
					           
					           
					         <div class="form-group">
								<label for="answer" class="control-label mb-10">Post Code *</label>
													
							     <input value="<?php echo $record['post_code'];?>"  type="number" class="form-control" id="" placeholder="Post Code" name="post_code" required=""  >			
        								
											
					           </div>
					           
					           
					        <div class="form-group">
								<label for="answer" class="control-label mb-10">Birth Date *</label>
													
							     <input type="date" value="<?php echo $record['dob'];?>" class="form-control" id="" required name="dob" required>	
        								
											
					           </div>
					           
					           
					           
					        
					        <div class="form-group">
								<label for="answer" class="control-label mb-10">Address 1 *</label>
													
							     <textarea class="form-control" id="" placeholder="Address 1" required="" name="address_first"><?php echo $record['address_first'];?></textarea>	
        								
											
					           </div>
					           
					           
					           <div class="form-group">
								<label for="answer" class="control-label mb-10">Address 2</label>
													
							      <textarea class="form-control" id="" placeholder="Address 2"  name="address_second"><?php echo $record['address_second'];?></textarea>	
        								
											
					           </div>
					           
					           <div class="form-group">
								<label for="answer" class="control-label mb-10">Address 3</label>
													
							      <textarea class="form-control" id="" placeholder="Address 3" name="address_third"><?php echo $record['address_third'];?></textarea>
        								
											
					           </div>
					           
					           
					           <div class="form-group">
								<label for="answer" class="control-label mb-10">Customer Image *</label>
													
							      <input type="file" id="myFile" accept="image/*" name="customer_image"  />
				
											
					           </div>
					           <?php
                			         
                		  $file_path1 = FCPATH . '/assets/images/customer/'.$record['customer_image']; 
                		
                			 if(file_exists($file_path1)) { ?>
					            <div class="form-group">
					                <input type="hidden" name="hidden_img" value="<?php echo $record['customer_image'];?>">
								<label for="answer" class="control-label mb-10">Previous customer Image *</label>
													
							      <img style="margin:15px 0px;width:100px;height:100px;float: left;" class="img-responsive" src="<?php echo base_url();?>/assets/images/customer/<?php echo $record['customer_image'];?>">
				
											
					           </div>
					           
					           <?php } ?>
					                       
					           
					                               
					                       
					                       
					                       
					                       
					                                    
													
												</div>
											</div>
											
											
										   </div>
										   
										 
										
											<div class="form-group mb-0">
												<button value="Submit" name="faq_submit" type="submit" class="btn btn-success btn-anim">Submit</button>
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
			
			
		
			
			