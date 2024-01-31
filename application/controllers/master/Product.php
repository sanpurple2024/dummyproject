<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {
    
     function __construct(){
           parent::__construct();
          $this->load->model(array('Common_model','Mail_template_model','Login_model','Product_model'));
          $this->load->library('excel');
          $this->load->helper(array('common_helper'));
   }
  
//****************************************************************************** 
    function upload_product_file(){
        
        $this->load->view("master/comman/header");
	    $this->load->view("master/comman/left_sidebar");
	    
	    $data['records']= $this->Product_model->get_product();
	    
	    
	    if(!empty($_FILES)){
    	    $files = $_FILES['userfiles']; 
            if(count($files['name'])>0){
                // $config['upload_path'] = './assets/images/product/';
                // $config['allowed_types'] = 'gif|jpg|png';
                // $config['max_size'] = 1024; // Maximum file size in kilobytes
                // $config['max_width'] = 1024;
                // $config['max_height'] = 768;
                
                $this->load->library('upload');
    
                foreach ($files['name'] as $key => $filename) {
                    $_FILES['userfile']['name'] = $files['name'][$key];
                    $_FILES['userfile']['type'] = $files['type'][$key];
                    $_FILES['userfile']['tmp_name'] = $files['tmp_name'][$key];
                    $_FILES['userfile']['error'] = $files['error'][$key];
                    $_FILES['userfile']['size'] = $files['size'][$key];
                    
                   $this->upload->initialize($this->set_upload_options());
                    if ($this->upload->do_upload('userfile')) {
                        $data = $this->upload->data();
                    } else {
                        $error = array('error' => $this->upload->display_errors());
                        print_r($error);
                    }
                }
            }
        
	    }
	    
	    
        $this->load->view('master/product/upload_product_images',$data);
		$this->load->view("master/comman/footer");
    }
    
   
//******************************************************************************


   public function product_upload_excelold(){
       
        $this->load->view("master/comman/header");
	    $this->load->view("master/comman/left_sidebar");
	    $this->load->library('upload');
	    
	   $file_mimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'); 
	  $table= "ci_states";
	  
     if(isset($_FILES['file']['name']) && in_array($_FILES['file']['type'], $file_mimes)){
      
         $arr_file = explode('.', $_FILES['file']['name']);
         $extension = end($arr_file);
         if('csv' == $extension){
             $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
         }elseif('xls' == $extension){
             $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
         }else {
             $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
         }
         $spreadsheet = $reader->load($_FILES['file']['tmp_name']);
         $sheetData = $spreadsheet->getActiveSheet()->toArray();
 
  			
			$list 			= $list1 = [];
			$m=1;
			foreach($sheetData as $key => $val) {
				if($key != 0) {
				  
				  
				  
				    var_dump($val);
					 
					 
					 if($val['1']==""){
					       $this->session->set_flashdata('errors', $wrongValue.'Product Name is required');
							redirect(base_url('master/ad_product_listing'));
					 }
					 
					 if($val['2']==""){
					       $this->session->set_flashdata('errors', $wrongValue.'Actual Price is required');
							redirect(base_url('master/ad_product_listing'));
					 }
					 
					 if($val['3']==""){
					       $this->session->set_flashdata('errors', $wrongValue.'Selling Price is required');
							redirect(base_url('master/ad_product_listing'));
					 }
					 
					 //check product name is avaiable or not
					 
					 $str_name = str_replace(["®","/",",", "&", "@", "$", "_", "#",".","!","^","?","(",")","+"," "],   "-",  $value[1] );
					 
					 $area_check=$this->db->query('SELECT * FROM product WHERE  product_name="'.$val['1'].'"')->num_rows();
        			$country = strtolower($val['1']);		
        			$country = trim($country);	
        			
        			
        			
        			//check category
        			if($val['10']!=""){  
			      
        			    $category_check=$this->db->query('SELECT * FROM categories WHERE  category_name="'.$val['10'].'"')->num_rows();
        			    $category_result=$this->db->query('SELECT * FROM categories WHERE  category_name="'.$val['10'].'"')->result();
        			    
        			    if($category_check>0){
        			        $categories_id = $category_result[0]->id;
        			    }else{
        			        $cat_name = str_replace(["®","/",",", "&", "@", "$", "_", "#",".","!","^","?","(",")","+"," "],   "-",  $val['10'] );
        			        $categories_data['category_name'] = $val['10'];
        			        $categories_data['cat_slug'] = $cat_name;
        			        $categories_data['status'] = "1";
        			        $this->db->insert("categories",$categories_data);
        	              	$categories_id = $this->db->insert_id();
        			    }
        			}else{
        			    $categories_id = "";
        			}
        			
        			
        			//Check product brand
        			
        			
        			//product brand fetch
			    
			      if($val['9']!=""){
			    
    			    $brand_check=$this->db->query('SELECT * FROM product_brand WHERE  brand_name="'.$val['9'].'"')->num_rows();
    			    $brand_result=$this->db->query('SELECT * FROM product_brand WHERE  brand_name="'.$val['9'].'"')->result();
    			    
    			    if($brand_check>0){
    			       $brand_id = $brand_result[0]->id;
    			    }else{
    			        $brand_slug = str_replace(["®","/",",", "&", "@", "$", "_", "#",".","!","^","?","(",")","+"," "],   "-",  $val['9'] );
    			        $brand_data['brand_name'] = $val['9'];
    			        $brand_data['brand_slug'] = $brand_slug;
    			        $brand_data['is_active'] = "1";
    			        
    			        $this->db->insert("product_brand",$brand_data);
    	              	$brand_id = $this->db->insert_id();
    			    }
			    
        	    }else{
        	        $brand_id = "";
        	    }
        	    
        	    
        	    
        	      $list1 [] = array(
					'product_name' => ($val['product_name']!="") ? $val['1'] : "",
					'slug'=>$str_name,
					'actual_price'=>($val['2']!="") ? $val['2'] : "",
					'selling_price'=>($val['3']!="") ? $val['3'] : "",
					'weight'=>($val['4']!="") ? $val['4'] : "",
					'stocks'=>($val['5']!="") ? $val['5'] : "",
					'out_of_stock'=>($val['6']!="") ? $val['6'] : "",
					'manufacture'=>($val['7']!="") ? $val['7'] : "",
					'manufacture_address'=>($val['8']!="") ? $val['8'] : "",
					'brand_name'=>$brand_id,
					'category'=>$categories_id,
					'description'=>($val['11']!="") ? $val['11'] : "",
					'long_description'=>($val['12']!="") ? $val['12'] : "",
					'status'=>'1',
					'product_image1'=>($val['13']!="") ? $val['13'] : "",
					'product_image2'=>($val['14']!="") ? $val['14'] : "",
					'product_image3'=>($val['15']!="") ? $val['15'] : "",
					'product_image4'=>($val['16']!="") ? $val['16'] : "",
					'product_image5'=>($val['17']!="") ? $val['17'] : "",
					
				);
					 
					 
				// 	 if($table=='ci_states'){
					 
					   //$data_res=$this->college_m->get_data_by_field($field,addslashes(trim($val[1])),'ci_states');
					 
						
				// 		 $list1 [] = [
				// 			 'state_name'        =>  trim($val[1]),
				// 			 'abbr1'=>  trim($val[2]),
				// 			 'abbr2'    =>  trim($val[3]),
				// 			 'abbr3'    =>  trim($val[4]),
				// 			 'status'		=> "1",
				// 			 'display_order'=>'1'
				// 		 ];
						 
				// 	 }
				
				  }
				$m++;
			}
			
			die;
			
			if(count($list1) > 0) {
			 //$results 	= $this->college_m->add_tblbatch($list1,$table); 
			 //	$this->session->set_flashdata('success', 'Data Imported Successfully!');
				// redirect(base_url('admin/state'));
			}else{
				// $this->session->set_flashdata('error', 'No Data Imported!');
				// redirect(base_url('admin/state'));
			}
			
            
        }
        else{
// 			   $this->session->set_flashdata('errors', 'Something Went Wrong!');
// 			redirect(base_url('admin/state/'.$link));
		}
	
       $this->load->view('master/product/product_upload_excel');
		$this->load->view("master/comman/footer");
       
   }
 //****************************************************************************


    public function product_upload_excel(){
	 
		$this->load->view("master/comman/header");
	    $this->load->view("master/comman/left_sidebar");
	    $this->load->library('upload');
	    
	    
	   
		if(!empty($_POST)){
		     
			if($_FILES['file']['name'] != ''){
			
				$config['upload_path'] = './assets/images/excel-files/';
				$config['allowed_types'] ='xls';
				$config['max_size']  = '0';
				$config['max_width']  = '0';
				$config['max_height']  = '0';
			    $this->load->library('upload', $config);
				$this->upload->initialize($config);
				$filename='';
				if(! $this->upload->do_upload('file')){
					$data['msg'] = $this->upload->display_errors();
				}else{
					$file = $this->upload->data();
					$filename = $config['upload_path'].$file['file_name'];
				}
			
				if($filename!= ''){
					$this->load->library('excel_reader');
					$this->excel_reader->read($filename);
					$worksheet = $this->excel_reader->sheets[0];
					
				    //echo '<pre>';print_r($worksheet);die;
					if(strtolower($worksheet['cells'][1][1]) == 'product_name'){
						if($worksheet['numRows'] > 0){
						$x=2;
						$upload_data = array();
						while($x <= $worksheet['numRows'] ) {
							$y=1;
							while($y<=$worksheet['numCols']) {  
							    
								$upload_data[$x][strtolower(str_replace(' ', '_',$worksheet['cells'][1][$y]))] = isset($worksheet['cells'][$x][$y]) ? trim($worksheet['cells'][$x][$y]) : ''; 
								
								$y++;
							}  
						  $x++;
						}	
					
					//print_r($upload_data);exit;
						$result = $this->Product_model->add_countries_excel_file_record($upload_data);
				
				
				
						}
				// 		else{
				// 		$this->session->set_flashdata('error', 'Upload Wrong File..');
				// 				// 	redirect('master/country_management/countries');
				// 	}
				
                      $file = $filename;
								if(is_file($file))
								unlink($file); 						
								if(!empty($result)){
								
									$this->session->set_flashdata('success', 'New Record Added Successfully...');
								// 	redirect('master/country_management/countries');
								}
								else
										{
											$this->session->set_flashdata('error', 'Not Added...');
								// 	redirect('master/country_management/countries');
					}
					}else{
							$this->session->set_flashdata('error', $read);
									redirect('master/country_management/countries');
					}
					
					
					
				
				}else{
					$this->session->set_flashdata('error', 'Please Download below format and upload..');
									redirect('master/country_management/countries');
				}
			}else{
				$this->session->set_flashdata('error', 'Please Upload .xls Files.');
									redirect('master/country_management/countries');
			}
		}
		$this->load->view('master/product/product_upload_excel');
		$this->load->view("master/comman/footer");
	}
	
//******************************************************************************	
	function product_download_excel(){
	    $page_name = 'master/product';	
		$download_data = $this->Product_model->product_download();		
		$this->load->helper('csv');
		query_to_csv($download_data, TRUE, $page_name.'('.date("m-d-Y").')'.'.csv');
	}
	
//******************************************************************************

	public function ad_product_listing(){
	    
	    $this->load->view("master/comman/header");
	    $this->load->view("master/comman/left_sidebar");
	   // $data['role_permissions']=json_decode($this->session->userdata['role_permissions'],TRUE);
		$data['records'] = $this->Product_model->get_product();

		if(!empty($_POST)){
		    $delete_ids=$_POST['delete_ids'];
			$delete=$this->Common_model->commonMultiDelete('product',$delete_ids);	
			 $insert_history = array("comment"=>"Product Deleted","ip_address"=>$_SERVER['REMOTE_ADDR']);
            insert_history_project($insert_history);
			(!empty($delete)) ? $this->session->set_flashdata('success', 'Deleted Successfully...') : $this->session->set_flashdata('error', 'Not Deleted...');
			redirect('master/ad_product_listing');
		}
		
		$this->load->view('master/product/product_listing',$data);
		$this->load->view("master/comman/footer");
	}
	
//******************************************************************************

	public function product_review(){
	    
	    $this->load->view("master/comman/header");
	    $this->load->view("master/comman/left_sidebar");
	 
		$data['records'] = $this->Product_model->get_product_review();

		
		$this->load->view('master/product/product_review',$data);
		$this->load->view("master/comman/footer");
	}
	
//****************************************************************************


     public function review_delete($id){
         
        $result=$this->Common_model->commonDelete('product_reviews',array('id'=>$id));	
        
         $insert_history = array("comment"=>"Product Review Deleted","ip_address"=>$_SERVER['REMOTE_ADDR']);
            insert_history_project($insert_history);
	    	
		(!empty($result)) ? $this->session->set_flashdata( 'success', 'Product Review Deleted Successfully...' ) : $this->session->set_flashdata( 'error', 'Product Review Not Deleted...' );
		 redirect('master/product_review');
	}

	function product_status($id,$status){
	    
	    $updated_status=$status==1?'0':'1';
        $result=$this->Common_model->commonUpdate('product',array('status'=>$updated_status),array('id'=>$id));
         $insert_history = array("comment"=>"Product Status Changed","ip_address"=>$_SERVER['REMOTE_ADDR']);
            insert_history_project($insert_history);
       
	    (!empty($result)) ? $this->session->set_flashdata( 'success', 'Status Changed Successfully.' ) : $this->session->set_flashdata( 'error', 'Status Not Changed.' );
         redirect('master/ad_product_listing');
	}
	
//**********************************************************************

	function product_delete($id){
	    
	    $result=$this->Common_model->commonDelete('product',array('id'=>$id));	
	    $insert_history = array("comment"=>"Product Deleted","ip_address"=>$_SERVER['REMOTE_ADDR']);
            insert_history_project($insert_history);
		(!empty($result)) ? $this->session->set_flashdata( 'success', 'Product Deleted Successfully...' ) : $this->session->set_flashdata( 'error', 'Product Not Deleted...' );
		 redirect('master/ad_product_listing');
	}
	
//***********************************************************************************************************	
    
    function product_edit($id){
        
        $data['product_id'] = $id;
        $this->load->view("master/comman/header");
	    $this->load->view("master/comman/left_sidebar");
	    $data['record']  = $this->Common_model->CommonRetrivedata('product','*',array('id'=>$id),2);
	    
	    if(!empty($_POST)){
		    $this->load->library('upload');
		    if($_FILES['product_image1']['name']!=""){
		        $this->upload->initialize($this->set_upload_options());
				$this->upload->do_upload("product_image1");
				$dataInfo1 = $this->upload->data();
				$img_name1 = $_FILES['product_image1']['name'];
		    }else{
		       $img_name1 = $_POST['hidden_img1']; 
		    }
		    
		    if($_FILES['product_image2']['name']!=""){
		        $this->upload->initialize($this->set_upload_options());
				$this->upload->do_upload("product_image2");
				$dataInfo2 = $this->upload->data();
				$img_name2 = $_FILES['product_image2']['name'];
		    }else{
		       $img_name2 = $_POST['hidden_img2']; 
		    }
		    
		    
		    
		    if($_FILES['product_image3']['name']!=""){
		        $this->upload->initialize($this->set_upload_options());
				$this->upload->do_upload("product_image3");
				$dataInfo3 = $this->upload->data();
				$img_name3 = $_FILES['product_image3']['name'];
		    }else{
		       $img_name3 = $_POST['hidden_img3']; 
		    }
		    
		    
		    
		    if($_FILES['product_image4']['name']!=""){
		        $this->upload->initialize($this->set_upload_options());
				$this->upload->do_upload("product_image4");
				$dataInfo4 = $this->upload->data();
				$img_name4 = $_FILES['product_image4']['name'];
		    }else{
		       $img_name4 = $_POST['hidden_img4']; 
		    }
		    
		    
		    if($_FILES['product_image5']['name']!=""){
		        $this->upload->initialize($this->set_upload_options());
				$this->upload->do_upload("product_image5");
				$dataInfo5 = $this->upload->data();
				$img_name5 = $_FILES['product_image5']['name'];
		    }else{
		       $img_name5 = $_POST['hidden_img5']; 
		    }
		    
        
        $str_name = str_replace(["®","/",",", "&", "@", "$", "_", "#","."],   "-",  $_POST['product_name'] );
		 	$update=array(
    			'product_name'=>$_POST['product_name'], 
    			'ip_address'=>$_SERVER['REMOTE_ADDR'], 
    			'brand_name'=>$_POST['brand_name'],
    			'description'=>$_POST['description'],
    			'long_description'=>$_POST['long_description'],
    			'category'=>$_POST['category'],
    			'product_image1'=>$img_name1,
    			'product_image2'=>$img_name2,
    			'product_image3'=>$img_name3,
    			'product_image4'=>$img_name4,
    			'product_image5'=>$img_name5,
    			'status'=>1,
    			'created_on'=>date("Y-m-d H:i:s"),
    			'weight'=>$_POST['weight'],
    			'actual_price'=>$_POST['actual_price'],
    			'selling_price'=>$_POST['selling_price'],
    			'slug'=>$_POST['slug'], 
    			'manufacture'=>$_POST['manufacture'],
    			'manufacture_address'=>$_POST['manufacture_address'],
    			'stocks'=>$_POST['stocks'],
    			'out_of_stock'=>$_POST['out_of_stock'],
    		);
    	
			$this->db->where('id',$id);
			$result=$this->Common_model->commonUpdate('product',$update,array('id'=>$id));
			
			 $insert_history = array("comment"=>"Product Updated","ip_address"=>$_SERVER['REMOTE_ADDR']);
            insert_history_project($insert_history);
			
		(!empty($result)) ? $this->session->set_flashdata('success', 'updated Successfully...') : $this->session->set_flashdata('error', 'Not updated...');
			 redirect('master/ad_product_listing');
		}
			
	    $data['brand']= $this->Product_model->get_brand();
	    $data['categories']=$this->Product_model->Get_categories();
        $this->load->view('master/product/product_edit',$data);
		$this->load->view("master/comman/footer");
    }
    
    private function set_upload_options(){  
        $config = array();
        $config['upload_path'] = './assets/images/product/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size']      = 1024; // 1MB
        $config['overwrite']     = FALSE;
        return $config;
    }


//*****************************************************************************	
   
   
   public function product_add(){
       
        $this->load->view("master/comman/header");
	    $this->load->view("master/comman/left_sidebar");
	    
		$data['records']= $this->Common_model->CommonRetrivedata('product','*','',1);	
		if(!empty($_POST)){
		  
		    
		    if(!empty($_FILES)){
			
				$this->load->library('upload');
				
					$this->upload->initialize($this->set_upload_options());
					$this->upload->do_upload("product_image1");
					$dataInfo1 = $this->upload->data();
			
					$this->upload->do_upload("product_image2");
					$dataInfo2 = $this->upload->data();
		
					
					$this->upload->do_upload("product_image3");
					$dataInfo3 = $this->upload->data();
		
					$this->upload->do_upload("product_image4");
					$dataInfo4 = $this->upload->data();
				
					$this->upload->do_upload("product_image5");
					$dataInfo5 = $this->upload->data();
			
			}else{
				$this->session->set_flashdata('error', 'Sorry. At least one Photo is required.');
				redirect('master/product/product_add');	
			}
          
       $str_name = str_replace(["®","/",",", "&", "@", "$", "_", "#","."],   "-",  $_POST['product_name'] );
          
			$insert=array(
    			'product_name'=>$_POST['product_name'], 
    			'ip_address'=>$_SERVER['REMOTE_ADDR'], 
    			'brand_name'=>$_POST['brand_name'],
    			'slug'=>$_POST['slug'], 
    			'description'=>$_POST['description'],
    			'category'=>$_POST['category'],
    			'product_image1'=>$_FILES['product_image1']['name'],
    			'product_image2'=>$_FILES['product_image2']['name'],
    			'product_image3'=>$_FILES['product_image3']['name'],
    			'product_image4'=>$_FILES['product_image4']['name'],
    			'product_image5'=>$_FILES['product_image5']['name'],
    			'status'=>1,
    			'created_on'=>date("Y-m-d H:i:s"),
    			'actual_price'=>$_POST['actual_price'],
    			'weight'=>$_POST['weight'],
    			'selling_price'=>$_POST['selling_price'],
    			'manufacture'=>$_POST['manufacture'],
    			'manufacture_address'=>$_POST['manufacture_address'],
    			'stocks'=>$_POST['stocks'],
    			'out_of_stock'=>$_POST['out_of_stock'],
    		);
    
// .................................attribute add..........................

		$insert_product=$this->Common_model->commonInsert('product',$insert);
	    $insert_history = array("comment"=>"Product Added","ip_address"=>$_SERVER['REMOTE_ADDR']);
            insert_history_project($insert_history);
// .............................................................................		
		
		(!empty($insert_product))? $this->session->set_flashdata('success', 'Added Successfully...') : $this->session->set_flashdata('error', 'Not Added...');
		 redirect('master/ad_product_listing');
		}
		$data['categories']=$this->Product_model->Get_categories();
		$data['brand']=$this->Product_model->get_brand();
	    $this->load->view('master/product/product_add',$data);
		$this->load->view("master/comman/footer");
   }
}
