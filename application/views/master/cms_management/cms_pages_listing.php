
<!-- Main Content -->
		<div class="page-wrapper">
			<div class="container-fluid">
				
				<!-- Title -->
				<div class="row heading-bg">
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
					  <h5 class="txt-dark">CMS Pages Listing</h5>
					</div>
					<!-- Breadcrumb -->
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
					  <ol class="breadcrumb">
						<li><a href="<?php echo base_url();?>master/dashboard">Dashboard</a></li>
						<li><a href="<?php echo base_url();?>master/cms_pages"><span>CMS Pages</span></a></li>
						<li class="active"><span>CMS Pages Listing</span></li>
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
									<h6 class="panel-title txt-dark">CMS Pages Listing</h6>
								</div>
								
								<div class="pull-right">
								    <a href="<?php echo base_url();?>master/add_cms_page" name="add_cms_page" class="btn btn-success btn-anim">Add</a>
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
                                                  <th>Heading </th>
                                                  <th>Actions</th>
													</tr>
												</thead>
											<tbody>
											    
											     <?php 
											    
											         if(!empty($record)){
					                                    foreach($record As $key =>$row){
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
                                       <td><a href="<?php echo site_url(); ?><?php echo $row['url'];?>" target="_blank"> <?php echo $row['page_name']?>  </td>    
                    				   <td>
    					 
                                      <a class="green action-buttons-padding" href="<?php echo site_url();?>master/cms_pages_edit/<?php echo $row['id']?>"><i class="fa fa-edit fa-lg"></i></a>
                                     <a   class="red action-buttons-padding confirm_alert"  data-title="Are you sure Confirm Delete CMS Pages" href="<?php echo site_url(); ?>master/change_cms_delete/<?php echo $row['id'];?> " id="delete"  ><i class="fa fa-trash fa-lg"></i></a>
                				       
                					  
                                      <!--<a class="blue action-buttons-padding" href="<?php echo site_url();?>master/cms_pages_view/<?php echo $row['id']?>"><i class="fa fa-search-plus fa-lg"></i></a>-->
                					
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
							
							
							
							
							
							