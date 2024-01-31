
<!-- Main Content -->
		<div class="page-wrapper">
			<div class="container-fluid">
				
				<!-- Title -->
				<div class="row heading-bg">
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
					  <h5 class="txt-dark">Customer Listing</h5>
					</div>
					<!-- Breadcrumb -->
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
					  <ol class="breadcrumb">
						<li><a href="<?php echo base_url();?>master/dashboard">Dashboard</a></li>
						<li><a href="<?php echo base_url();?>master/ad_customer_listing"><span>Customer</span></a></li>
						<li class="active"><span>Customer-Listing</span></li>
					  </ol>
					</div>
					<!-- /Breadcrumb -->
				</div>
				<!-- /Title -->
				
				
					
				<div class="row">
					<div class="col-sm-12">
						<div class="panel panel-default card-view">
							<div class="panel-heading">
								<div class="pull-left">
									<h6 class="panel-title txt-dark">Customer Listing</h6>
								</div>
								
								<div class="pull-right">
								    <a href="<?php echo base_url();?>master/add_customer" name="add_customer" class="btn btn-success btn-anim">Add</a>
								</div>
								
								<div class="clearfix"></div>
							</div>
							
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
									<div class="table-wrap">
										<div class="">
											<table id="myTable1" class="table table-hover display  pb-30" >
												<thead>
													<tr>
                                			
												 <th>S.No</th>
                                				   <th>Customer Name</th>
                                				   <th>Email</th>
                                				   <th>Mobile</th>
                                				   <th>Gender</th>
                                				  
                                				   <th>Post Code</th>
                                				   <th>address</th>
                                				   <th>Status</th>
                                				   <th>Action</th>
													</tr>
												</thead>
											<tbody>
											    
											     <?php 
											         if(!empty($records)){
					                                    foreach($records as $key =>$row){ ?>
				                            	
												<tr>
				
                                           <td><?php echo $key+1;?></td>
                                           <td><?php echo $row['name'];?></td>
                        				   <td><?php echo $row['email'];?></td>
                        				   <td><?php echo $row['mobile'];?></td>
                        				   <td><?php echo $row['gender'];?></td>
                        				   <td><?php echo $row['post_code'];?></td>
                        				   <td><?php echo $row['address_first'];?></td>
									   
                					<td> 
                					<?php  if((isset($role_permissions['customer_listing']) && in_array('status', $role_permissions['customer_listing'])) || $this->session->userdata('role_type')==0){?>
                						<a class="badge <?php echo $row['status']==1?'bg-green':'bg-red'; ?> confirm_alert"  data-title="Are you sure Confirm to Change Status?"  href="<?php echo base_url();?>master/change_customer_status/<?php echo $row['id'];?>/<?php echo $row['status'];?>"  id="status"  title="status"><?php echo $row['status']==1?'Active':'De Active'; ?></a>
                						<?php } ?>
                					</td>
                                  
                				<td>
                			
                				         <a class="green action-buttons-padding" href="<?php echo site_url(); ?>master/edit_customer/<?php echo $row['id'];?>"><i class="fa fa-edit fa-lg"></i></a>
                				
                			
                							<a   class="red action-buttons-padding confirm_alert"  data-title="Are you sure Confirm Delete Customer" href="<?php echo site_url(); ?>master/change_customer_delete/<?php echo $row['id'];?> " id="delete"  ><i class="fa fa-trash fa-lg"></i></a>
                				         <a class="green action-buttons-padding" href="<?php echo site_url(); ?>master/customer/change_password/<?php echo $row['id'];?>">Change Password</a>
                				
                			
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
							
							
							