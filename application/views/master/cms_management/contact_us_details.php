<!-- Main Content -->
			<div class="page-wrapper">
				<div class="container-fluid">
					<!-- Title -->
					<div class="row heading-bg">
						<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
							<h5 class="txt-dark">Contact Us Details</h5>
						</div>
					
						<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
							<ol class="breadcrumb">
								<li><a href="<?php echo base_url();?>master/dashboard">Dashboard</a></li>
								<li><a href="<?php echo base_url();?>master/contact_us_details"><span>Contact Us</span></a></li>
								<li class="active"><span>Contact Us Details</span></li>
							</ol>
						</div>
					
					</div>
				
					<div class="row">
						<div class="col-md-12">
							<div class="panel panel-default card-view">
								<div class="panel-heading">
									<div class="pull-left">
										<h6 class="panel-title txt-dark">Edit Profile</h6>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										<form id="contact_us_details" method="POST" >
										     <div class="row">
											<div class="col-md-6">
												<div class="form-wrap">
												
														<div class="form-group">
															<label for="inputconf_address" class="control-label mb-10">Address *</label>
														<textarea class="form-control" rows="3" id="inputconf_address" placeholder="Enter ..." name="addres" required ><?php  echo $record['address']?></textarea>
														</div>
														
														<div class="form-group">
															<label for="inputconf_description" class="control-label mb-10">Description *</label>
														<textarea class="form-control" rows="3" id="inputconf_description" placeholder="Enter ..." name="contact_us_description" ><?php  echo $record['contact_us_description']?></textarea>
														</div>
														
														<div class="form-group">
															<label for="inputmobile" class="control-label mb-10">Mobile Number</label>
														<input id="inputmobile" type="text" class="form-control" id="inputmobile" placeholder="Enter Mobile No"  name="mobile"  value="<?php  echo $record['mobile_no']?>" required > 
														</div>
														
														
														<div class="form-group">
															<label for="inputaltmobile" class="control-label mb-10">Alt Mobile No</label>
													    	<input type="text" class="form-control" id="inputaltmobile" placeholder="Enter Alt Mobile No" name="alt_mobile"  value="<?php  echo $record['alt_mobile_no']?>"> 
													
														</div>
														
														
														<div class="form-group">
															<label for="inputalemail" class="control-label mb-10">E-Mail ID *</label>
													    	<input required type="email" class="form-control" id="inputalemail" placeholder="Enter E-Mail ID " name="email_id"  value="<?php  echo $record['email_id']?>"> 
													
														</div>
														
														
															<div class="form-group">
															<label for="alt_email_id" class="control-label mb-10">Alt E-Mail ID </label>
													    	<input type="email" class="form-control" id="alt_email_id" placeholder="Enter Alt E-Mail ID " name="alt_email_id"  value="<?php  echo $record['alt_email_id']?>"> 
													
														</div>
														
												
												</div>
											
											
										
												<div class="form-wrap">
												  
												
														<div class="form-group">
															<label for="facebook_link" class="control-label mb-10">Facebook</label>
														<input type="text" class="form-control" id="facebook_link" placeholder="https://www.instragram.com/user/sparkinfosyshyd" name="facebook" value="<?php  echo $record['facebook_link']?>" >
														</div>
														
															<div class="form-group">
															<label for="Twitter_link" class="control-label mb-10">Twitter</label>
														<input type="text" class="form-control" id="Twitter_link" placeholder="https://www.instragram.com/user/sparkinfosyshyd" name="twitter_link" value="<?php  echo $record['twitter_link']?>" >
														</div>
														
														<div class="form-group">
															<label for="linked_link" class="control-label mb-10">Linked In</label>
														     <input type="text" class="form-control" id="linked_link" placeholder="https://plus.google.com/+Sparkinfosyshyderabad/posts" name="linked_in" value="<?php  echo $record['linked_in_link']?>">
														</div>
														
														
														<!--<div class="form-group">-->
														<!--	<label for="youtube_link" class="control-label mb-10">Youtube</label>-->
														<!--    	<input type="text" class="form-control" id="youtube_link" placeholder="https://plus.google.com/+Sparkinfosyshyderabad/posts" name="youtube" value="<?php  echo $record['youtube_link']?>">-->
														<!--</div>-->
														
														<div class="form-group">
															<label for="instagram" class="control-label mb-10">Instragram</label>
														    <input type="text" class="form-control" id="instagram" placeholder="https://www.instragram.com/user/sparkinfosyshyd" name="instagram" value="<?php  echo $record['instagram_link']?>" >
														</div>
														
														
														<div class="form-group">
															<label for="whatsup_no" class="control-label mb-10">Whatsapp No</label>
														    <input type="number" class="form-control" id="whatsup_no" placeholder="Enter 10 Digits Whatsapp Number" name="whatsapp_number" value="<?php  echo $record['whatsapp_number']?>" >
					<span class="red">Enter only 10 Digit Whatsapp Mobile Number</span>
														</div>
														
														
														
														<div class="form-group">
															<label for="mapcode" class="control-label mb-10">Map Code</label>
														   <textarea class="form-control" id="mapcode" rows="3" placeholder="Enter ..." name="map_code"><?php  echo $record['map_code']?></textarea>
														</div>
														
													
												
												</div>
										
											
												<div class="form-group text-center">
															<button value="Submit" name="web_submit" type="submit" class="btn btn-success btn-anim">Submit</button>
														</div>
											
										</div>
										
										
										
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				
				</div>
				

				
			</div>
			<!-- /Main Content -->