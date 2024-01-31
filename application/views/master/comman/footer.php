

<style>
    .ckeditor{
        visibility:visible !important;
    }
</style>
<?php

if($this->session->flashdata('success') != '')
{
$msg = $this->session->flashdata('success');
$heading = 'Success';
$icon = 'success';
}else
if ($this->session->flashdata('error') != '')
	{
	$msg = $this->session->flashdata('error');
	$heading = 'Error';
	$icon = 'error';
	}
  else
   if (isset($error) && $error != ''){
	
    	$msg = $error;
    	$heading = 'Error';
    	$icon = 'error';
	}
  else
   if (isset($success) && $success != ''){
	
    	$msg = $success;
    	$icon = 'success';
    	$heading = 'Success';
	}else{
		$msg = '';
        $icon = '';
        $icon = '';

	}		
?>



				<!-- Footer -->
				<footer class="footer container-fluid pl-30 pr-30">
					<div class="row">
						<div class="col-sm-12">
							<!--<p>2024 &copy; swadisha. Developed By Sanpurple INC</p>-->
						</div>
					</div>
				</footer>
				<!-- /Footer -->

				
			</div>
			<!-- /Main Content -->
		</div>


		<script src="<?php echo base_url();?>assets/vendors/bower_components/jquery/dist/jquery.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>assets/common/js/jquery.toast.js"></script>
		<script src="<?php echo base_url();?>assets/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
		<script src="<?php echo base_url();?>assets/vendors/bower_components/jasny-bootstrap/dist/js/jasny-bootstrap.min.js"></script>
		<script src="<?php echo base_url();?>assets/dist/js/jquery.slimscroll.js"></script>
		<!--<script src="<?php echo base_url();?>assets/vendors/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>-->

         <!-- Bootstrap Core JavaScript -->
         <script src="<?php echo base_url();?>assets/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
         <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
    	 <script type='text/javascript' src='<?php echo base_url();?>assets/common/js/jquery-confirm.min.js'></script>
    	 
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
	<script src="<?php echo base_url();?>assets/vendors/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
	<script src="<?php echo base_url();?>assets/vendors/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
	<script src="<?php echo base_url();?>assets/vendors/bower_components/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
	<script src="<?php echo base_url();?>assets/dist/js/responsive-datatable-data.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Sample data
        var data = {
            labels: ['Label 1', 'Label 2', 'Label 3'],
            datasets: [{
                data: [30, 50, 20], // Values for each segment
                backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56'] // Colors for each segment
            }]
        };
    
        // Get the context of the canvas element
        var ctx = document.getElementById('myPieChart').getContext('2d');
    
        // Create a pie chart
        var myPieChart = new Chart(ctx, {
            type: 'pie',
            data: data
        });
    </script>
    	 <script>
           $(document).ready(function() {
              $('#summernote').summernote();
              $('#summernote2').summernote();
              $('#summernote3').summernote();
            });
        </script>
    	 
                <script>
				
				//   $( document ).ready(function() {
    //                       $(function () {
    //                         $('#datable_1').DataTable()
    //                         $('#datable_1').DataTable({
    //                           'responsive'	: false,
    //                     	  'paging'      : true,
    //                           'lengthChange': false,
    //                           'searching'   : false,
    //                           'ordering'    : true,
    //                           'info'        : true,
    //                           'autoWidth'   : false
    //                         })
    //                       })
          
				//   });
                </script>

		<script>
		
		
		function deleteAllData(){ 
                 var checked_num = $('input[name="delete_ids[]"]:checked').length;
                  
                 
                
              if (checked_num == 0) {
                  alert('Select Atleast One Check Box... ');
                  return false;
                  }
              else if (checked_num > 0){ 
                     
                  if(confirm('Confirm Delete?')==true){
                 
                //   window.location = $(location).attr('href');
                  return true;
                }
                  else{
                  return false;
                  }
              }
        }
        
        
       
		    
		    $( document ).ready(function() {
		        
//**************************************************************************
	
		        $('.change_cod_status').on('change', function() {
     
                     var search_val = $(this).closest('tr').find('.change_cod_status').val();
                     var order_id = $(this).closest('tr').attr("data-id");
                     var data_url = $(this).closest('tr').attr("data-url");
                         
                         $.ajax({
                			type: "post",
                			url:"<?php echo site_url();?>master/change_cod_status",
                			data:{'status_value':search_val,'order_id':order_id,'data_url':data_url},
                			success:function(result){
                					
                				 window.location = '<?php echo base_url();?>master/cod_listing/'+result;
                			}
                		 });
                		 
                		 
              });
		        
		        
//**************************************************************************		       
		     
                $('#select_all').on('click',function(){
               
                  
                    if(this.checked){
                        $('.checkbox').each(function(){
                            this.checked = true;
                        });
                    }else{
                         $('.checkbox').each(function(){
                            this.checked = false;
                        });
                    }
                });
//**************************************************************************                
                $('.checkbox').on('click',function(){
                    if($('.checkbox:checked').length == $('.checkbox').length){
                        $('#select_all').prop('checked',true);
                    }else{
                        $('#select_all').prop('checked',false);
                    }
                });
//**************************************************************************                
                
                $('a.confirm_alert').confirm({
                    content: "",
                    });
                $('a.confirm_alert').confirm({
                      buttons: {
                        hey: function(){
                          location.href = this.$target.attr('href');
                        }
                      }
                });	
		        
	//************************************************************
    
    
    var productlisting_Table = $('#datable_1').DataTable({
         "orderSequence": ["desc", "asc"],
          "orderable": true,
          'processing': true,
          'serverSide': true,
          'serverMethod': 'post',
           "bLengthChange": false,
            'ajax': {
             'url':'<?php echo base_url();?>product_listing_filter',
               'data': function(data){  
                   data.todate = $('#to_date').val();
                   data.fromdate = $('#from_date').val();
            }
          },
          'columns': [
             { data: 'id' },
             { data: 'name' },
             
          ],
          'columnDefs': [ {
          'targets': [0,1,2], 
          'orderable': false, 
        }]
        });
       $('#searchName').keyup(function(){
          productlisting_Table.draw();
       });
       $('#from_date, #to_date').on('change', function () {
           productlisting_Table.draw();
           
       });
       
        //****************************************************************
       
       
       $('#upload_product_image').submit(function(e){
              e.preventDefault(); 
            $.ajax({
              url: '<?php echo base_url();?>master/upload_product_file',
              type: 'POST',
              data: new FormData(this),
              contentType:false,  
              processData:false,
            })
            .done(function(data){
                 window.location = '<?php echo base_url();?>master/upload_product_file';
          })  
            .fail(function(){
               alert('Try again later'); 
            });
    
           
		   });
       
       
       //****************************************************************
       
       
       $('#upload_excel').submit(function(e){
              e.preventDefault(); 
            $.ajax({
              url: '<?php echo base_url();?>master/product_upload_excel',
              type: 'POST',
              data: new FormData(this),
              contentType:false,  
              processData:false,
            })
            .done(function(data){
                // window.location = '<?php echo base_url();?>master/ad_web_settings';
          })  
            .fail(function(){
               alert('Try again later'); 
            });
    
           
		   });
       
       //****************************************************************
       
       
       $('#web_setting').submit(function(e){
              e.preventDefault(); 
            $.ajax({
              url: '<?php echo base_url();?>master/web_settings/ad_submit_web_setting',
              type: 'POST',
              data: new FormData(this),
              contentType:false,  
              processData:false,
            })
            .done(function(data){
                window.location = '<?php echo base_url();?>master/ad_web_settings';
          })  
            .fail(function(){
               alert('Try again later'); 
            });
    
           
		   }); 
		   
		   
	//****************************************************************
       
       
       $('#add_cms_page').submit(function(e){
    
              e.preventDefault(); 
            $.ajax({
              url: '<?php echo base_url();?>master/add_cms_page',
              type: 'POST',
              data: new FormData(this),
              contentType:false,  
              processData:false,
            })
            .done(function(data){
              
                window.location = '<?php echo base_url();?>master/cms_pages';
          })  
            .fail(function(){
              alert('Try again later');  
        
            });
    
           
		   }); 
		   
		   
		//****************************************************************
       
       
       $('#add_faq').submit(function(e){
    
              e.preventDefault(); 
            $.ajax({
              url: '<?php echo base_url();?>master/add_faq',
              type: 'POST',
              data: new FormData(this),
              contentType:false,  
              processData:false,
            })
            .done(function(data){
              
                window.location = '<?php echo base_url();?>master/faqs';
          })  
            .fail(function(){
              alert('Try again later');  
        
            });
    
           
		   }); 
		   
		   
			//****************************************************************
       
       
       $('#add_banner').submit(function(e){
    
              e.preventDefault(); 
            $.ajax({
              url: '<?php echo base_url();?>master/add_banner',
              type: 'POST',
              data: new FormData(this),
              contentType:false,  
              processData:false,
            })
            .done(function(data){
              
                window.location = '<?php echo base_url();?>master/ad_banners';
          })  
            .fail(function(){
              alert('Try again later');  
        
            });
    
           
		   }); 
		   
		   
		 //****************************************************************
       
       
       $('#add_blog').submit(function(e){
    
              e.preventDefault(); 
            $.ajax({
              url: '<?php echo base_url();?>master/add_blog',
              type: 'POST',
              data: new FormData(this),
              contentType:false,  
              processData:false,
            })
            .done(function(data){
              
                window.location = '<?php echo base_url();?>master/ad_blog';
          })  
            .fail(function(){
              alert('Try again later');  
        
            });
    
           
		   }); 
		   
		   
		   
		
		   
		//****************************************************************
       
       
       $('#edit_faq').submit(function(e){
    
              e.preventDefault(); 
              
              var id = $("#primary_id").val();
            $.ajax({
              url: '<?php echo base_url();?>master/edit_faq/'+id,
              type: 'POST',
              data: new FormData(this),
              contentType:false,  
              processData:false,
            })
            .done(function(data){
                window.location = '<?php echo base_url();?>master/faqs';
          })  
            .fail(function(){
              alert('Try again later');  
            });
    
           
		   }); 
		   
		   
		   
		  	//****************************************************************
       
       
       $('#edit_testimonial').submit(function(e){
    
              e.preventDefault(); 
              
              var id = $("#primary_id").val();
            $.ajax({
              url: '<?php echo base_url();?>master/testimonials_edit/'+id,
              type: 'POST',
              data: new FormData(this),
              contentType:false,  
              processData:false,
            })
            .done(function(data){
                window.location = '<?php echo base_url();?>master/faqs';
          })  
            .fail(function(){
              alert('Try again later');  
            });
    
           
		   }); 
		   
		   
		 	//****************************************************************
       
       
       $('#edit_banner').submit(function(e){
    
              e.preventDefault(); 
              
              var id = $("#primary_id").val();
            $.ajax({
              url: '<?php echo base_url();?>master/edit_banner/'+id,
              type: 'POST',
              data: new FormData(this),
              contentType:false,  
              processData:false,
            })
            .done(function(data){
                window.location = '<?php echo base_url();?>master/ad_banners';
          })  
            .fail(function(){
              alert('Try again later');  
            });
    
           
		   }); 
		   
		   
		 	//****************************************************************
       
       
       $('#edit_blog').submit(function(e){
    
              e.preventDefault(); 
              
              var id = $("#primary_id").val();
            $.ajax({
              url: '<?php echo base_url();?>master/edit_blog/'+id,
              type: 'POST',
              data: new FormData(this),
              contentType:false,  
              processData:false,
            })
            .done(function(data){
                 window.location = '<?php echo base_url();?>master/ad_blog';
          })  
            .fail(function(){
              alert('Try again later');  
            });
    
           
		   }); 
		   
		   
		   
		   //****************************************************************
       
       
       $('#edit_cms_page').submit(function(e){
    
              e.preventDefault(); 
              
              var id = $("#primary_id").val();
            $.ajax({
              url: '<?php echo base_url();?>master/cms_pages_edit/'+id,
              type: 'POST',
              data: new FormData(this),
              contentType:false,  
              processData:false,
            })
            .done(function(data){
                window.location = '<?php echo base_url();?>master/cms_pages';
          })  
            .fail(function(){
              alert('Try again later');  
            });
    
           
		   }); 
		   
		   
		//****************************************************************
       
       
       $('#edit_brand').submit(function(e){
    
            e.preventDefault(); 
              
            var id = $("#primary_id").val();
            $.ajax({
              url: '<?php echo base_url();?>master/brand_name_edit/'+id,
              type: 'POST',
              data: new FormData(this),
              contentType:false,  
              processData:false,
            })
            .done(function(data){
              
                window.location = '<?php echo base_url();?>master/brand_listing';
          })  
            .fail(function(){
              alert('Try again later');  
        
            });
    
           
		   }); 
		   
		   
		//****************************************************************
       
       
       $('#edit_category').submit(function(e){
    
            e.preventDefault(); 
            var id = $("#primary_id").val();
            
            $.ajax({
              url: '<?php echo base_url();?>master/categories_edit/'+id,
              type: 'POST',
              data: new FormData(this),
              contentType:false,  
              processData:false,
            })
            .done(function(data){
                window.location = '<?php echo base_url();?>master/category_list';
            })  
            .fail(function(){
              alert('Try again later');  
        
            });
    
           
		   }); 
		   
 //*****************************************************************************
       
       $('#admin_change_password').submit(function(e){
    
            e.preventDefault(); 
            $.ajax({
              url: '<?php echo base_url();?>master/ad_change_password',
              type: 'POST',
              data: new FormData(this),
              contentType:false,  
              processData:false,
            })
            .done(function(data){
                
                 window.location = '<?php echo base_url();?>master/ad_change_password';
          })  
            .fail(function(){
              alert('Try again later');  
        
            });
    
           
		   });
		   
		   
		   //*****************************************************************************
       
       $('#change_password').submit(function(e){
    
            e.preventDefault(); 
            var id = $("#user_id").val();
            $.ajax({
              url: '<?php echo base_url();?>master/change_password/'+id,
              type: 'POST',
              data: new FormData(this),
              contentType:false,  
              processData:false,
            })
            .done(function(data){
                
                 window.location = '<?php echo base_url();?>master/ad_customer_listing';
          })  
            .fail(function(){
              alert('Try again later');  
        
            });
    
           
		   });
		        
		        
//*********************************************************************
       
       
       $('#admin_edit_profile').submit(function(e){
    
            e.preventDefault(); 
            $.ajax({
              url: '<?php echo base_url();?>master/admin_edit_profile',
              type: 'POST',
              data: new FormData(this),
              contentType:false,  
              processData:false,
            })
            .done(function(data){
                
                 window.location = '<?php echo base_url();?>master/admin_edit_profile';
          })  
            .fail(function(){
              alert('Try again later');  
        
            });
    
           
		   }); 
		   
//******************************************************************************
       
       
       $('#add_category').submit(function(e){
    
            e.preventDefault(); 
            $.ajax({
              url: '<?php echo base_url();?>master/add_category',
              type: 'POST',
              data: new FormData(this),
              contentType:false,  
              processData:false,
            })
            .done(function(data){
                
                 window.location = '<?php echo base_url();?>master/category_list';
          })  
            .fail(function(){
              alert('Try again later');  
        
            });
    
           
		   });   
		   
		   
		   
//*****************************************************************************
       
       $('#add_subcategory').submit(function(e){
    
            e.preventDefault(); 
            $.ajax({
              url: '<?php echo base_url();?>master/add_subcategory',
              type: 'POST',
              data: new FormData(this),
              contentType:false,  
              processData:false,
            })
            .done(function(data){
                
                 window.location = '<?php echo base_url();?>master/sub_category_list';
          })  
            .fail(function(){
              alert('Try again later');  
        
            });
    
           
		   }); 
		   
//*****************************************************************************
       
       $('#add_testimonial').submit(function(e){
    
            e.preventDefault(); 
            $.ajax({
              url: '<?php echo base_url();?>master/testimonials_add',
              type: 'POST',
              data: new FormData(this),
              contentType:false,  
              processData:false,
            })
            .done(function(data){
                
                 window.location = '<?php echo base_url();?>master/ad_testimonials_listing';
          })  
            .fail(function(){
              alert('Try again later');  
        
            });
    
           
		   });   
		   
		   
//*****************************************************************************
       
       $('#edit_subcategory').submit(function(e){
    
            e.preventDefault(); 
            
             var id = $("#primary_id").val();
            $.ajax({
              url: '<?php echo base_url();?>master/sub_categories_edit/'+id,
              type: 'POST',
              data: new FormData(this),
              contentType:false,  
              processData:false,
            })
            .done(function(data){
                 window.location = '<?php echo base_url();?>master/sub_category_list';
            })  
            .fail(function(){
              alert('Try again later');  
        
            });
    
           
		   }); 
		   
		   
		//****************************************************************
       
       $('#add_brand').submit(function(e){
    
            e.preventDefault(); 
            $.ajax({
              url: '<?php echo base_url();?>master/add_brand',
              type: 'POST',
              data: new FormData(this),
              contentType:false,  
              processData:false,
            })
            .done(function(data){
                
                 window.location = '<?php echo base_url();?>master/brand_listing';
          })  
            .fail(function(){
              alert('Try again later');  
        
            });
    
           
		   }); 
		   
		   
		 	//****************************************************************
       
       $('#add_customer').submit(function(e){
    
            e.preventDefault(); 
            $.ajax({
              url: '<?php echo base_url();?>master/add_customer',
              type: 'POST',
              data: new FormData(this),
              contentType:false,  
              processData:false,
            })
            .done(function(data){
                
         window.location = '<?php echo base_url();?>master/ad_customer_listing';
          })  
            .fail(function(){
              alert('Try again later');  
        
            });
    
           
		   });   
		   
		   
		   //****************************************************************
       
       
       $('#contact_us_details').submit(function(e){
    
            e.preventDefault(); 
            $.ajax({
              url: '<?php echo base_url();?>master/contact_us_submit',
              type: 'POST',
              data: new FormData(this),
              contentType:false,  
              processData:false,
            })
            .done(function(data){
                 window.location = '<?php echo base_url();?>master/contact_us_details';
           })  
            .fail(function(){
              alert('Try again later');  
        
            });
    
           
		   });    
		        
		        
		        
		        
		  //***************************************************************
		        
		   $('#admin_forget_passsword').submit(function(e){
    
              e.preventDefault(); 
            $.ajax({
              url: '<?php echo base_url();?>admin_forget_pwd',
              type: 'POST',
              data: new FormData(this),
              contentType:false,  
              processData:false,
            })
            .done(function(data){
              
                if(data.trim()==1){
                  alert("Password Reset Successfully. New Password Sent your register Email Id");
                    window.location = '<?php echo base_url();?>master/login';
                }else{
                    alert("Invalid Email Id");
                    window.location = '<?php echo base_url();?>master/master_forget_password';
                }
          })  
            .fail(function(){
              alert('Try again later');  
        
            });
    
           
		   });    
		        
		  //***************************************************************
		        
		 $('#admin_login').submit(function(e){
    
            e.preventDefault(); 
            $.ajax({
              url: '<?php echo base_url();?>login_check',
              type: 'POST',
              data: new FormData(this),
              contentType:false,  
              processData:false,
            })
            .done(function(data){
              
                if(data.trim()==1){
                //   alert("Login Successfully...");
                    window.location = '<?php echo base_url();?>master/dashboard';
                }else{
                    // alert("Invalid credentails...");
                    window.location = '<?php echo base_url();?>master/login';
                }
          })  
            .fail(function(){
              alert('Try again later');  
        
            });
    
           }); 
		       
		       
		       //***************************************************************
		       
		        
		    });
		 //***************************************************************    
		    
		     $("#state_wrp").hide();
             $("#city_wrp").hide();
        
          $(document).on('change', '#country', function() {
            var val = $(this).val();
            $.ajax({
                type: "POST",
                url:'<?php echo base_url();?>master/get_state',
                data: {val:val},
                async: false,
                success: function(res) {
                   $("#state_wrp").show();
                   $("#state").html(res);
                },
                complete: function() {
                  
                },
            });
        });
       
       //***************************************************************    
       
        $(document).on('change', '#state_change', function() {
            var val = $(this).val();
            $.ajax({
                type: "POST",
                url:'<?php echo base_url();?>master/get_city',
                data: {val:val},
                async: false,
                success: function(res) {
                   $("#city_wrp").show();
                   $("#city").html(res);
                },
                complete: function() {
                 
                },
            });
        });
        
        
         //***************************************************************
		    
		    
		</script>
		
		<script src="<?php echo base_url();?>assets/dist/js/init.js"></script>
		<script src="<?php echo base_url();?>assets/ckeditor/ckeditor.js"></script>
		
		<script><?php

            if ($msg != '')
            	{ ?>$.toast({heading: '<?php
            	echo $heading; ?>',text: '<?php
            	echo $msg; ?>',showHideTransition: 'fade',position: 'top-right',icon: '<?php
            	echo $icon; ?>'});<?php
            	} ?>
            </script>
	</body>
</html>


