
<!-- Main Content -->
		<div class="page-wrapper">
			<div class="container-fluid">
				
				<!-- Title -->
				<div class="row heading-bg">
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
					  <h5 class="txt-dark">Contact Us Enquiries Listing</h5>
					</div>
					<!-- Breadcrumb -->
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
					  <ol class="breadcrumb">
						<li><a href="<?php echo base_url();?>master/dashboard">Dashboard</a></li>
						<li><a href="<?php echo base_url();?>master/ad_enquiries"><span>Contact Us Enquiries</span></a></li>
						<li class="active"><span>Contact Us Enquiries Listing</span></li>
					  </ol>
					</div>
					<!-- /Breadcrumb -->
				</div>
				<!-- /Title -->
				
				
					
				<div class="row">
					<div class="col-sm-12">
						<div class="panel panel-default card-view">
						    
						    
						    	<div class="panel-wrapper collapse in">
								<div class="panel-body">
									<div class="table-wrap">
										<div class="">
											<table id="myTable1" class="table table-hover display  pb-30" >
												<thead>
													<tr>
                                			
												  <th>S.No</th>
												  <th>Name </th>
                                                  
                                				  <th>Service</th>
                                				  <th>message</th>
                                                
                                                  <th>Actions</th>
													</tr>
												</thead>
											<tbody>
											    
											     <?php 
											         if(!empty($records)){
					                                    foreach($records as $key =>$row){
				                            	?>
													<tr>
													    
    							
                                
                      <td><?php echo $key+1;?></td>
                       <td><?php echo "<b>Name: </b> ".$row['firstname']."".$row['lastname']."<br/>".
                        "<b>Mobile:</b> ". $row['phone']."<br/>"."<b>Email:</b> ". $row['email']."<br/>"; ?> </td>
					  
                      <td> <?php echo $row['service']?>  </td>
                      <td> <?php echo $row['message']?>  </td>
                     
					 <td>
						 <a class="red action-buttons-padding confirm_alert"  data-title="Are you sure Confirm Delete?" href="<?php echo site_url(); ?>master/contact_us_enquiries_delete/<?php echo $row['id'];?> "id="delete"  ><i class="fa fa-trash fa-lg"></i></a>
					 </td>
                  </tr>
													
													<?php
					                                }
											     } ?>
											
												</tbody>
											</table>
										</div>
									</div>
									
								</div>
							</div>
						</div>	
					</div>
				</div>
				<!-- /Row -->
			
			</div>
			
			
		</div>
        <!-- /Main Content -->