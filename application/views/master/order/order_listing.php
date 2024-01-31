
<!-- Main Content -->
		<div class="page-wrapper">
			<div class="container-fluid">
				
				<!-- Title -->
				<div class="row heading-bg">
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
					  <h5 class="txt-dark"><?php echo $orders_status_name;?> Listing</h5>
					</div>
					<!-- Breadcrumb -->
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
					  <ol class="breadcrumb">
						<li><a href="<?php echo base_url();?>master/dashboard">Dashboard</a></li>
						<li><a href="<?php echo base_url();?>master/cod_listing/<?php echo $order_status;?>"><span><?php echo $orders_status_name;?></span></a></li>
						<li class="active"><span><?php echo $orders_status_name;?> Listing</span></li>
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
									<h6 class="panel-title txt-dark"><?php echo $orders_status_name;?> Listing</h6>
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
                                                   <th>Invoice No</th>
                                                   <th>Member Details</th>
                                                   <th>Original/Offer Price</th>
                                                  
                                                   <!--<th>Discount</th>-->
                                                   <th>Paid Amount</th>
                                                   <th>Order Date</th>
                        						   <th>Status</th>
                                                   <th>Payment Details</th>
                                                   <th>Actions</th>
											    </tr>
												</thead>
											<tbody>
											    
											 <?php 
			if(!empty($orders)){
						foreach($orders as $key =>$row){ ?>
                        <tr>
					
                           <td><?php echo $key+1;?></td>
                           <td> 
							<a href="<?php echo site_url();?>master/order_invoice/<?php echo $row['id'];?>" target="_blank">   <span class="blue"><b>  <?php echo $row['order_id'];?></b> </span> </a>
                           </td>
                           <td>  <a class="blue" href="<?php echo site_url();?>master/members/profile_view/<?php echo $row['member_id'];?>" target="_blank">  </a> <br>
                              <?php echo $row['name'];?> <br> <?php echo $row['mobile_no'];?> <br> <?php echo $row['email_id'];?>
                           </td>
                          
                           <td> Rs. <?php echo $row['original_price'];?> <br> Rs. <?php echo $row['offer_price'];?></td>
                           <!--<td> Rs. <?php echo $row['discount_amount'];?></td>-->
                           <!--<td> Rs. <?php echo $row['gst_amount'];?> <br> (<?php echo $row['gst_percentage'];?></td>-->
                           <td> Rs. <?php echo $row['final_paid_amount'];?></td>
                           <td> <?php echo Datetimeconversion($row['order_date_time']);?> </td>
                           <td>
								<?php if($row['order_status']==0){ ?>
									<span class="badge bg-yellow">Pending</span>
								<?php }elseif($row['order_status']==1){ ?>
									<span class="badge bg-green">Success</span>
								<?php }elseif($row['order_status']==2){ ?>
									<span class="badge bg-red">Failed</span>
								<?php }else{ ?>
									<span class="badge bg-purple">Refunded</span>
								<?php } ?>
						   </td>
						   <td> 
							<span class="badge <?php echo $row['payment_type']==0?'bg-green':'bg-red'; ?>"><?php echo $row['payment_type']==0? 'Online':'Off-line'; ?></span>
							<br>
							<?php if($row['payment_type']==0){ ?>
								Payment Status:
								<?php if($row['payment_status']==0){ ?>
									<span class="badge bg-yellow">Pending</span>
								<?php }elseif($row['payment_status']==1){ ?>
									<span class="badge bg-green">Success</span>
								<?php }elseif($row['payment_status']==2){ ?>
									<span class="badge bg-red">Failed</span>
								<?php }else{ ?>
									<span class="badge bg-purple">Refunded</span>
								<?php } ?><br>
								Gateway: <?php echo $row['payment_gateway_name'];?><br>
								Payment Id: <?php echo $row['payment_id'];?>
							<?php }else { ?>
								Payment Status:
								<?php if($row['offline_payment_status']==0){ ?>
									<span class="badge bg-red">Not-Paid</span>
								<?php }else{ ?>
									<span class="badge bg-green">Paid</span>
								<?php } ?><br>
								Payment Method:<?php echo $row['offline_payment_method_name'];?><br>
								Payment Date: <?php echo Datetimeconversion($row['offline_payment_date_time']);?>
							<?php } ?>
							</td>
                           <td>
						  
                              <a class="blue action-buttons-padding" href="<?php echo site_url();?>master/orders_invoice/<?php echo $row['id'];?>/<?php echo $order_status;?>"><i class="fa fa-search-plus fa-lg"></i></a>
							
                              <a   class="red action-buttons-padding confirm_alert"  data-title="Are you sure Confirm Delete?" href="<?php echo site_url(); ?>master/order_delete/<?php echo $row['id'];?>/<?php echo $order_status;?>" id="delete"  ><i class="fa fa-trash fa-lg"></i></a>
							 
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
        
        				
							
							