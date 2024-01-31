
<!-- Main Content -->
		<div class="page-wrapper">
			<div class="container-fluid">
				
				<!-- Title -->
				<div class="row heading-bg">
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
					  <h5 class="txt-dark">FAQ's Listing</h5>
					</div>
					<!-- Breadcrumb -->
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
					  <ol class="breadcrumb">
						<li><a href="<?php echo base_url();?>master/dashboard">Dashboard</a></li>
						<li><a href="<?php echo base_url();?>master/faqs"><span>Faq</span></a></li>
						<li class="active"><span>FAQ's Listing</span></li>
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
									<h6 class="panel-title txt-dark">FAQ's Listing</h6>
								</div>
								
								<div class="pull-right">
								    <a href="<?php echo base_url();?>master/add_faq" name="add_faq" class="btn btn-success btn-anim">Add</a>
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
                                                 <!--<label class="pos-rel">-->
                                                 <!--<input type="checkbox" class="" id="select_all"/>-->
                                                 <!-- <span class="lbl"></span>-->
                                                 <!-- </label>-->
                                                 <!--</th>-->
												 <th>S.No</th>
                            				     <th>Question</th>
                            				     <th>Answer</th>
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
                				   <td><?php echo $row['question'];?></td>
                				   <td><?php echo $row['answer'];?></td>
                               <td>
                    				
						        <a class="green action-buttons-padding" href="<?php echo site_url(); ?>master/edit_faq/<?php echo $row['id'];?>"><i class="fa fa-edit fa-lg"></i></a>
						        
						        
						          <a   class="red action-buttons-padding confirm_alert"  data-title="Are you sure Confirm Delete?" href="<?php echo site_url(); ?>master/faqs_delete/<?php echo $row['id'];?> " id="delete"  ><i class="fa fa-trash fa-lg"></i></a>
						
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