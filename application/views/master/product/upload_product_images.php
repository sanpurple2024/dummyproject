
<style>
    .img_width{
        width:100px;
        height:auto;
    }
</style>
<!-- Main Content -->
			<div class="page-wrapper">
				<div class="container-fluid">
					<!-- Title -->
					<div class="row heading-bg">
						<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
							<h5 class="txt-dark">Upload Product Images</h5>
						</div>
					
						<!-- Breadcrumb -->
						<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
							<ol class="breadcrumb">
								<li><a href="<?php echo base_url();?>master/dashboard">Dashboard</a></li>
								<li><a href="<?php echo base_url();?>master/ad_product_listing"><span>Product</span></a></li>
								<li class="active"><span>Upload Product Images</span></li>
							</ol>
						</div>
						<!-- /Breadcrumb -->
					
					</div>
					<!-- /Title -->
					
					<!-- Row -->
					<div class="row">
						<div class="col-md-12">
							<div class="panel panel-default card-view">
								<div class="panel-heading">
									<div class="pull-left">
										<h6 class="panel-title txt-dark">Upload Product Images</h6>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
											<form enctype="multipart/form-data" id="upload_product_image" method="POST" >
										   <div class="row">
											<div class="col-md-6">
												<div class="form-wrap">
												
														<div class="form-group">
															<label for="inputName" class="control-label mb-10">Upload File *</label>
															 <input name="userfiles[]" multiple type="file" id="exampleInputFile" placeholder=" Choose File..." class="form-control" required>
														</div>
														
									
											
										</div>
										
												
											</div>				
												
												
											
											<div class="col-md-6">
											  
												
														</div>
														
										<label for="inputName" style="margin-top:25px;"></label>
											<button value="Submit" name="import_product" type="submit" class="btn btn-success btn-anim">Submit</button>
										
									</div>
									
										</form>
										
										
								
									
									
									
								</div>
							</div>
							
								<!--...................................	-->
										
										<div class="panel-wrapper collapse in">
								<div class="panel-body">
									<div class="table-wrap">
										<div class="">
											<table id="myTable1" class="table table-hover display  pb-30" >
												<thead>
													<tr>
													   <th>Id</th>
													   <th>Product Name</th>
													   <th>Product Image 1</th>
													   <th>Product Image 2</th>
													   <th>Product Image 3</th>
													   <th>Product Image 4</th>
													   <th>Product Image 5</th>
													</tr>
												</thead>
											<tbody>
											    
										     <?php 
					if(!empty($records)){
					foreach($records as $key =>$row){
					    
					    
					
					?>
										<tr>
											<td><?php echo $row['id'];?></td>
											<td><?php echo $row['product_name'];?></td>
											<td>
											    
											    <?php 
    									$file_path1 = FCPATH . '/assets/images/product/'.$row['product_image1'];
    									
    									$file_path2 = FCPATH . '/assets/images/product/'.$row['product_image2'];
    									
    									$file_path3 = FCPATH . '/assets/images/product/'.$row['product_image3'];
    									$file_path4 = FCPATH . '/assets/images/product/'.$row['product_image4'];
    									$file_path5 = FCPATH . '/assets/images/product/'.$row['product_image5'];
											    
											    
											    if($row['product_image1']!="" &&  file_exists($file_path1)){
											    ?>
											    
											    <img class="img_width" src="<?php echo base_url()."assets/images/product/".$row['product_image1'];?>"></img>  
											    
											    <?php 
											    } 
											    
					    ?>
											    
											</td>
											<td>
											    
											   <?php
											   if($row['product_image2']!="" && file_exists($file_path2)){
											    ?>
											    <img class="img_width" src="<?php echo base_url()."assets/images/product/".$row['product_image2'];?>"></img>
											    
											    <?php } ?>
											    </td>
											<td>
											    
											    <?php
											   if($row['product_image3']!="" &&  file_exists($file_path3)){
											    ?>
											    <img class="img_width" src="<?php echo base_url()."assets/images/product/".$row['product_image3'];?>"></img>
											    
											    <?php } ?>
											    </td>
											<td>
											    
											    <?php
											   if($row['product_image4']!="" &&  file_exists($file_path4)){
											    ?>
											    <img class="img_width" src="<?php echo base_url()."assets/images/product/".$row['product_image4'];?>"></img>
											    
											    <?php } ?>
											    </td>
											<td>
											     <?php
											   if($row['product_image5']!="" &&  file_exists($file_path5)){
											    ?>
											    <img class="img_width" src="<?php echo base_url()."assets/images/product/".$row['product_image5'];?>"></img>
											    
											    <?php } ?>
											    </td>
                                                        
													</tr>
													
													
											
					<?php
				
				}
						     }
					?>
				
											
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
							<!--.........................................-->
						</div>
					</div>
				
				</div>
				

				
			</div>
			