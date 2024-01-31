
<!-- Main Content -->
		<div class="page-wrapper">
			<div class="container-fluid">
				
				<!-- Title -->
				<div class="row heading-bg">
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
					  <h5 class="txt-dark">Blog Listing</h5>
					</div>
					<!-- Breadcrumb -->
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
					  <ol class="breadcrumb">
						<li><a href="<?php echo base_url();?>master/dashboard">Dashboard</a></li>
						<li><a href="<?php echo base_url();?>master/ad_blog"><span>Blog</span></a></li>
						<li class="active"><span>Blog Listing</span></li>
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
									<h6 class="panel-title txt-dark">Blog Listing</h6>
								</div>
								
								<div class="pull-right">
								    <a href="<?php echo base_url();?>master/add_blog" name="add_Blog" class="btn btn-success btn-anim">Add</a>
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
                                                    <th>Blog Name</th>
                                                    <th>Image </th>
                                                    <th>Image Alt Tag </th>
                                                    <th>title </th>
                                                    <th>status</th>
                                                    <th>Actions</th>
													</tr>
												</thead>
											<tbody>
					<?php if(!empty($records)){ 
                        foreach($records as $key=>$row){
                        ?>
                    <tr>
						
                          <td><?php echo $key+1;?></td>
                          <td><a href="<?php echo site_url(); ?>blog/details/<?php echo $row['blog_url'];?>" target="_blank"><?php echo $row['title'];?></a></td>
                          <td> <img src="<?php echo site_url();?>assets/images/blog/<?php echo $row['image'];?>" style="height:60px; width:100px;">    </td>
                          <td><?php echo $row['image_alt'];?></td>
                            <td><a href="<?php echo site_url(); ?>blog/details/<?php echo $row['blog_url'];?>" target="_blank"><?php echo $row['title'];?></td>
							  
                         
                          <td>
						 
						  <a  class="badge <?php echo $row['blog_status']==1?'bg-green':'bg-red'; ?> confirm_alert"  data-title="Are you sure Confirm to Change Status?"  href="<?php echo base_url();?>master/blog_status/<?php echo $row['id'];?>/<?php echo $row['blog_status'];?>"  id="status"  title="status"><?php echo $row['blog_status']==1?'Active':'De Active'; ?></a>
						   
						  </td>

                          <td>
							
								<a class="green action-buttons-padding" href="<?php echo site_url();?>master/edit_blog/<?php echo $row['id'];?>"><i class="fa fa-edit fa-lg"></i></a>
							
								<a   class="red action-buttons-padding confirm_alert"  data-title="Are you sure Confirm Delete?" href="<?php echo site_url(); ?>master/blog_delete/<?php echo $row['id'];?> "id="delete"  ><i class="fa fa-trash fa-lg"></i></a>
							
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