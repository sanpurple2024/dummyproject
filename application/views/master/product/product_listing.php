
<!-- Main Content -->
	      <!-- Main Content -->
		<div class="page-wrapper">
            <div class="container-fluid">
				
				<!-- Title -->
				<div class="row heading-bg">
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
					  <h5 class="txt-dark">Product Listing</h5>
					</div>
					<!-- Breadcrumb -->
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
					  <ol class="breadcrumb">
						<li><a href="<?php echo base_url();?>master/dashboard">Dashboard</a></li>
						<li><a href="<?php echo base_url();?>master/category_list"><span>Product</span></a></li>
						<li class="active"><span>Product Listing</span></li>
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
									<h6 class="panel-title txt-dark">Product Listing</h6>
								</div>
								<div class="pull-right">
								    <a href="<?php echo base_url();?>master/product_add" name="add_product" class="btn btn-success btn-anim">Add</a>
								</div>
									<div class="pull-right" style="margin-right:10px;">
								    <a href="<?php echo base_url();?>master/product_upload_excel" name="import_product" class="btn btn-success btn-anim">Upload Excel</a>
								</div>
								
								<!--<div class="pull-right" style="margin-right:10px;">-->
								<!--     <a href="<?php echo base_url();?>master/product_download_excel" class="btn btn-sm btn-warning" type="button"><i class="fa fa-download fa-lg"></i>Download Excel Format</a>-->
								     
								   
								<!--</div>-->
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
                                    				   <!--<th>Type</th>-->
                                    				   <th>Actual Price</th>
                                    				   <th>Selling Price</th>
                                    				   <th>Category</th>
                                    				   <!--<th>Sub Category</th>-->
                                    				   <th>Brand</th>
                                    				   <th>Status</th>
                                    				   <th>Action</th>
													</tr>
												</thead>
											<tbody>
											    
											     <?php if(!empty($records)){
					foreach($records as $key =>$row){?>
													<tr>
													    <td><?php echo $key+1;?></td>
                                                        <td><?php echo $row['product_name'];?></td>
                                    				    <!--<td><?php echo $row['type'];?></td>-->
    													<td><?php echo $row['actual_price'];?></td>
    				                                    <td><?php echo $row['selling_price'];?></td>
														<td>dr</td>
														<!--<td>th</td>-->
														<td>bg</td>
														<td><a class="badge <?php echo $row['status']==1?'bg-green':'bg-red'; ?> confirm_alert"  data-title="Are you sure Confirm to Change Status?"  href="<?php echo base_url();?>master/product_status/<?php echo $row['id'];?>/<?php echo $row['status'];?>"  id="status"  title="status"><?php echo $row['status']==1?'Active':'De Active'; ?></a></td>
														<td>  
														<a class="green action-buttons-padding" href="<?php echo site_url(); ?>master/product_edit/<?php echo $row['id'];?>"><i class="fa fa-edit fa-lg"></i></a>
														<a class="red action-buttons-padding confirm_alert"  data-title="Are you sure Confirm Delete product" href="<?php echo site_url(); ?>master/product/product_delete/<?php echo $row['id'];?> " id="delete"  ><i class="fa fa-trash fa-lg"></i></a>
		
														
														
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
				
				