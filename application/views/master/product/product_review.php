
<!-- Main Content -->
	      <!-- Main Content -->
		<div class="page-wrapper">
            <div class="container-fluid">
				
				<!-- Title -->
				<div class="row heading-bg">
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
					  <h5 class="txt-dark">Product Review Listing</h5>
					</div>
					<!-- Breadcrumb -->
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
					  <ol class="breadcrumb">
						<li><a href="<?php echo base_url();?>master/dashboard">Dashboard</a></li>
						<li><a href="<?php echo base_url();?>master/product_review"><span>Product</span></a></li>
						<li class="active"><span>Product Review Listing</span></li>
					  </ol>
					</div>
					<!-- /Breadcrumb -->
				</div>
				<!-- /Title -->
				
				<!-- Row -->
				<div class="row">
					<div class="col-sm-12">
						<div class="panel panel-default card-view">
							<div class="panel-heading">
								<div class="pull-left">
									<h6 class="panel-title txt-dark">Product Review Listing</h6>
								</div>
						
							</div>
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
									<div class="table-wrap">
										<div class="">
											<table id="myTable1" class="table table-hover display  pb-30" >
												<thead>
													<tr>
													   <th>S.No</th>
                                    				   <th>Product Name</th>
                                    				   <th>Rating</th>
                                    				   <th>Comment</th>
                                    				   <th>Action</th>
													</tr>
												</thead>
											<tbody>
											    
											     <?php if(!empty($records)){
					foreach($records as $key =>$row){?>
													<tr>
													    <td><?php echo $key+1;?></td>
                                                        <td><?php
                                                        $this->db->select("*");
                                                        $this->db->from('product');
                                                         if(isset($val['id'])){
                                                           $this->db->where('id', $val['product_id']);
                                                        }
                									    $querys = $this->db->get();  
                                                        $result_product = $querys->result_array();
                                                        
                                                                if(!empty($result_product)){
                                                    $product_name =       $result_product[0]['product_name'];
                                                }else{
                                                    $product_name = "";
                                                }
                                                        
                                                        
                                              echo $product_name;?></td>
                                    				   <td><?php echo $row['rating'];?></td>
    													<td><?php echo $row['comment'];?></td>
    				                                    
													
													
														<td>  
														<!--<a class="green action-buttons-padding" href="<?php echo site_url(); ?>master/product_edit/<?php echo $row['id'];?>"><i class="fa fa-edit fa-lg"></i></a>-->
														<a class="red action-buttons-padding confirm_alert"  data-title="Are you sure Confirm Delete product" href="<?php echo site_url(); ?>master/review_delete/<?php echo $row['id'];?> " id="delete"  ><i class="fa fa-trash fa-lg"></i></a>
														
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
				
				