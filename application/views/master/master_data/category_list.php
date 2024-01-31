
<!-- Main Content -->
		<div class="page-wrapper">
			<div class="container-fluid">
				
				<!-- Title -->
				<div class="row heading-bg">
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
					  <h5 class="txt-dark">Category Listing</h5>
					</div>
					<!-- Breadcrumb -->
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
					  <ol class="breadcrumb">
						<li><a href="<?php echo base_url();?>master/dashboard">Dashboard</a></li>
						<li><a href="<?php echo base_url();?>master/category_list"><span>Category</span></a></li>
						<li class="active"><span>Category Listing</span></li>
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
									<h6 class="panel-title txt-dark">Category Listing</h6>
								</div>
								<div class="pull-right">
								    <a href="<?php echo base_url();?>master/add_category" name="add_category" class="btn btn-success btn-anim">Add</a>
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
													    <!--<th class="center">-->
                 <!--                           				<label class="pos-rel">-->
                 <!--                           					<input type="checkbox" class="" id="select_all"/>-->
                 <!--                           					<span class="lbl"></span>-->
                 <!--                           				</label>-->
                 <!--                       			    </th>-->
													   <th>S.No</th>
                                    				   <th>Category Name</th>
                                    				   <th> Display Order</th>
                                    				   <th> Status</th>
                                    				   <th>Action</th>
													</tr>
												</thead>
											<tbody>
											    
											     <?php 
											         if(!empty($records)){
					                                    foreach($records as $key =>$row){
				                            	?>
													<tr>
													    
    													    <!--<td>-->
    													    <?php //if($row['no_of_profiles']==0){?>
                                            					<!--<label class="pos-rel">-->
                                            					<!--	<input type="checkbox" class="checkbox" name="delete_ids[]" id="delete_ids[]" value="<?php echo $row['id'];?>" />-->
                                            					<!--	<span class="lbl"></span>-->
                                            					<!--</label>-->
                                            					<?php //} ?>
                                            				<!--</td>-->
                                                           <td><?php echo $key+1;?></td>
                                        				   <td><?php echo $row['category_name'];?></td>
                                        				   <td><?php echo $row['display_order'];?></td>
                                        					<td>
                                                              	<a class="badge <?php echo $row['status']==1?'bg-green':'bg-red'; ?> confirm_alert"  data-title="Are you sure Confirm to Change Status?"  href="<?php echo base_url();?>master/categories_status/<?php echo $row['id'];?>/<?php echo $row['status'];?>"  id="status"  title="status"><?php echo $row['status']==1?'Active':'De Active'; ?></a>
                                        					</td>
                                        					<td>
                                        					    <a class="green action-buttons-padding" href="<?php echo site_url(); ?>master/categories_edit/<?php echo $row['id'];?>"><i class="fa fa-edit fa-lg"></i></a>
                                        					    <a class="red action-buttons-padding confirm_alert"  data-title="Are you sure Confirm Delete?" href="<?php echo site_url(); ?>master/categories_delete/<?php echo $row['id'];?> " id="delete"  ><i class="fa fa-trash fa-lg"></i></a>
                                        					</td>
                                        				</tr>
													
													<?php
					                                }
											     } ?>
											
												</tbody>
											</table>
										</div>
									</div>
									
									
									 <!--<div class="box box-default">-->
          <!--                              <div class="box-header with-border">-->
          <!--                      		<button type="submit" class="btn  btn-danger" onClick="return deleteAllData();" > <i class="fa fa-trash"></i> Delete </button>-->
          <!--                      		</div>-->
          <!--                            </div>-->
								</div>
							</div>
						</div>	
					</div>
				</div>
				<!-- /Row -->
			
			</div>
			
			
		</div>
        <!-- /Main Content -->
							
							
							
							
							