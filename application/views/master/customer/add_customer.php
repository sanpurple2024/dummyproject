<!-- Main Content -->
			<div class="page-wrapper">
				<div class="container-fluid">
					<!-- Title -->
					<div class="row heading-bg">
						<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
							<h5 class="txt-dark">Add</h5>
						</div>
					
						<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
							<ol class="breadcrumb">
								<li><a href="<?php echo base_url();?>master/dashboard">Dashboard</a></li>
								<li><a href="<?php echo base_url();?>master/ad_customer_listing"><span>Customer</span></a></li>
								<li class="active"><span>Add Customer</span></li>
							</ol>
						</div>
					
					</div>
				
					<div class="row">
						<div class="col-md-12">
							<div class="panel panel-default card-view">
								<div class="panel-heading">
									<div class="pull-left">
										<h6 class="panel-title txt-dark">Add Customer</h6>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
									    
									    <form enctype="multipart/form-data" id="add_customer" method="POST" >
										
										    <div class="row">
										    	<div class="col-md-6">
												<div class="form-wrap">
												
														<div class="form-group">
															<label for="question" class="control-label mb-10">Customer Name *</label>
														<input type="text" class="form-control" id="" placeholder="Customer name" name="customer_name" required=""  >
					                                         
					                                    </div>
					                                    
					                                    <div class="form-group">
															<label for="answer" class="control-label mb-10">Email *</label>
													<input type="email" class="form-control" id="" placeholder="Email" name="email" required>
					                                    </div>
					                                    
					                                    
					                                    
					                        <div class="form-group">
													<label for="answer" class="control-label mb-10">Mobile *</label>
												<input type="number" class="form-control" id="" placeholder="Mobile" name="mobile" required=""  >
					                       </div>
					                       
					                       
					                        <div class="form-group">
													<label for="answer" class="control-label mb-10">From Referal Code (e.g : e4567 Allowed only five digit) </label>
												<input type="number" class="form-control" id="" placeholder="From referal Code" name="from_referal_code" >
					                       </div>
					                       
					                       
					                       
					                       <div class="form-group">
													<label for="answer" class="control-label mb-10">Gender *</label>
													
													
        									<select class="form-control" name="gender"  id="gender" required>
                					   	 <option disabled>Select Gender</option>
                						
                							<option value="Male">Male</option>
                							<option value="Female">Female</option>
                						</select>
											
					                       </div>
					                       
					                       
					                       
					                       
					            <div class="form-group">
											<label for="answer" class="control-label mb-10">Country</label>
													
        								<select class="form-control" name="country" id="country" required >
            						        <option>Select Country</option>
            							<?php if(count($country)>0){ 
            							foreach($country AS $coun){ ?>
            							<option value="<?php echo $coun['country_name'];?>"><?php echo $coun['country_name'];?></option>
            							<?php 
            							}
            							}?>
            						</select>
											
					                       </div>
					                       
					                       
					                       
					            <div class="form-group" id="state_wrp">
											<label for="answer" class="control-label mb-10">State *</label>
													
													
        								<div id="state"></div>
											
					           </div>
					           
					           
					           <div class="form-group" id="city_wrp">
											<label for="answer" class="control-label mb-10">City *</label>
											
											<div id="city"></div>
													
													
        								
											
					           </div>
					           
					           
					         <div class="form-group">
								<label for="answer" class="control-label mb-10">Post Code *</label>
													
							     <input type="number" class="form-control" id="" placeholder="Post Code" name="post_code" required=""  >			
        								
											
					           </div>
					           
					           
					        <div class="form-group">
								<label for="answer" class="control-label mb-10">Birth Date *</label>
													
							     <input type="date" class="form-control" id="" required name="dob" required>	
        								
											
					           </div>
					           
					           
					           
					        
					        <div class="form-group">
								<label for="answer" class="control-label mb-10">Address 1 *</label>
													
							     <textarea class="form-control" id="" placeholder="Address 1" required="" name="address_first"></textarea>	
        								
											
					           </div>
					           
					           
					           <div class="form-group">
								<label for="answer" class="control-label mb-10">Address 2</label>
													
							      <textarea class="form-control" id="" placeholder="Address 2"  name="address_second"></textarea>	
        								
											
					           </div>
					           
					           <div class="form-group">
								<label for="answer" class="control-label mb-10">Address 3</label>
													
							      <textarea class="form-control" id="" placeholder="Address 3" name="address_third"></textarea>
        								
											
					           </div>
					           
					           
					           <div class="form-group">
								<label for="answer" class="control-label mb-10">Customer Image *</label>
													
							      <input type="file" id="myFile" accept="image/*" name="customer_image"  required/>
				
											
					           </div>
					                       
					            <div class="form-group">
								<label for="answer" class="control-label mb-10">Password *</label>
													
							      <input type="password" class="form-control" id="" placeholder="Password" name="password" required=""  >
				
											
					           </div>
					                               
					                       
					                       
					                       
					                       
					                                    
													
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
			
			
		
			
			