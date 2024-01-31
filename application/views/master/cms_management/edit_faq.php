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
								<li><a href="<?php echo base_url();?>master/faqs_listing"><span>FAQ</span></a></li>
								<li class="active"><span>Edit FAQ</span></li>
							</ol>
						</div>
					
					</div>
				
					<div class="row">
						<div class="col-md-12">
							<div class="panel panel-default card-view">
								<div class="panel-heading">
									<div class="pull-left">
										<h6 class="panel-title txt-dark">Edit FAQs listing</h6>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
									    
									    <form enctype="multipart/form-data" id="edit_faq" method="POST" >
										  <input type="hidden" id="primary_id" value="<?php echo $id;?>">
												
										    <div class="row">
										    	<div class="col-md-6">
												<div class="form-wrap">
												
														<div class="form-group">
															<label for="question" class="control-label mb-10">Question *</label>
															<input type="text" value="<?php echo $record['question'];?>" class="form-control" id="question" placeholder="Enter Question" name="question" required=""  >
					                                         
					                                    </div>
					                                    
					                                    <div class="form-group">
															<label for="answer" class="control-label mb-10">Answer *</label>
														       <textarea class="form-control" rows="8" name ="answer" placeholder="Enter Answer..." required=""   ><?php echo $record['answer'];?></textarea>
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
				

				
			</div>
			<!-- /Main Content -->
			
			