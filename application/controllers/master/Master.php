<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Controller {
    
    function __construct(){
           parent::__construct();
          $this->load->model(array('Common_model'));
          $this->load->helper(array('common_helper'));
    }
    
  
    function category_list(){
        $this->load->view("master/comman/header");
        $this->load->view("master/comman/left_sidebar");
        $data['records']=$this->Common_model->Get_categories();
	
		if(!empty($_POST)){
		    
		    $delete_ids=$_POST['delete_ids'];
			$delete=$this->Common_model->commonMultiDelete('categories',$delete_ids);	
			if(!empty($delete)){
			    $insert_history = array("comment"=>"Category Deleted","ip_address"=>$_SERVER['REMOTE_ADDR']);
            insert_history_project($insert_history);
				$this->session->set_flashdata('success', 'Deleted Successfully...');
			}else{
				$this->session->set_flashdata('error', 'Not Deleted...');
			}
		}
		$this->load->view('master/master_data/category_list',$data);
		$this->load->view("master/comman/footer");
    }
    
    function categories_delete($id){
        
	    $result=$this->Common_model->commonDelete('categories',array('id'=>$id));	
	    if($result){
	        $insert_history = array("comment"=>"Category Deleted","ip_address"=>$_SERVER['REMOTE_ADDR']);
            insert_history_project($insert_history);
	    }
		(!empty($result)) ? $this->session->set_flashdata( 'success', 'Deleted Successfully...' ) : $this->session->set_flashdata( 'error', 'Not Deleted...' );
		 redirect('master/category_list');
	}
	
	function sub_categories_edit($id){
	    
		$this->load->view("master/comman/header");
        $this->load->view("master/comman/left_sidebar");
		$data['record']  =$this->Common_model->CommonRetrivedata('sub_categories','*',array('id'=>$id),2);	
		
		if(!empty($_POST)){
			$update=array(
				'sub_cat_name'=>$this->input->post("sub_cat_name"), 
				'category_id'=>$this->input->post("category_id"), 
				'sub_cat_slug'=>$this->input->post("slug"), 
				'display_order'=>$this->input->post("display_order"), 
				'status'=>1, 
			);
			
			$this->db->where('id',$id);
			$result=$this->Common_model->commonUpdate('sub_categories',$update,array('id'=>$id));
			  $insert_history = array("comment"=>"Category Edited","ip_address"=>$_SERVER['REMOTE_ADDR']);
            insert_history_project($insert_history);
		    (!empty($result)) ? $this->session->set_flashdata('success', 'updated Successfully...') : $this->session->set_flashdata('error', 'Not updated...');
			 //redirect('master/sub_category_list');
		}
		$data['categories']=$this->Common_model->Get_categories();
		$this->load->view('master/master_data/sub_categories_edit',$data);
		$this->load->view("master/comman/footer");
	}
	
	function sub_categories_delete($id){
	    
	     $insert_history = array("comment"=>"Category Deleted","ip_address"=>$_SERVER['REMOTE_ADDR']);
          insert_history_project($insert_history);
	    $result=$this->Common_model->commonDelete('sub_categories',array('id'=>$id));	
		(!empty($result)) ? $this->session->set_flashdata( 'success', 'Deleted Successfully...' ) : $this->session->set_flashdata( 'error', 'Not Deleted...' );
		 redirect('master/sub_category_list');
	}

	function sub_categories_status($id,$status){
	    $updated_status = $status == 1 ? '0':'1';
        $result=$this->Common_model->commonUpdate('sub_categories',array('status'=>$updated_status),array('id'=>$id));	
        
        $insert_history = array("comment"=>"Category Status Changed","ip_address"=>$_SERVER['REMOTE_ADDR']);
          insert_history_project($insert_history);
          
          
	    (!empty($result)) ? $this->session->set_flashdata( 'success', 'Status Changed Successfully.' ) : $this->session->set_flashdata( 'error', 'Status Not Changed.' );
        redirect('master/sub_category_list');
	}
    
    function categories_edit($id){
        
        $this->load->view("master/comman/header");
        $this->load->view("master/comman/left_sidebar");
      
        $data['record']  = $this->Common_model->CommonRetrivedata('categories','*',array('id'=>$id),2);	
        
		if(!empty($_POST)){
		    
		    $old_image=$data['record']['image'];
		    
        		if (isset($_FILES['images']['name']) && $_FILES['images']['name'] != '') {
        		        $this->load->library('upload');
        		        $this->upload->initialize($this->set_upload_options());
        				$this->upload->do_upload("images");
        				$dataInfo1 = $this->upload->data();
        				$img_name = $_FILES['images']['name'];
        		}else{
        		    $img_name = $old_image;
        		}
        		 $update=array(
        			'category_name'=>$this->input->post("category_name"), 
        			'display_order'=>$this->input->post("display_order"), 
        			'cat_slug'=>$this->input->post("slug"), 
        			'status'=>$this->input->post("status"), 
        			'image'=>$img_name,
        			'status'=>'1'
        	  	);
        	  	
        	  
			$this->db->where('id',$id);
			$result=$this->Common_model->commonUpdate('categories',$update,array('id'=>$id));
			$insert_history = array("comment"=>"Category Updated","ip_address"=>$_SERVER['REMOTE_ADDR']);
          insert_history_project($insert_history);
		    (!empty($result)) ? $this->session->set_flashdata('success', 'updated Successfully...') : $this->session->set_flashdata('error', 'Not updated...');
			
		}
		
		$this->load->view('master/master_data/categories_edit',$data);
		$this->load->view("master/comman/footer");
    }
    
    function categories_status($id,$status){
        
        $updated_status = $status == 1 ? '0' : '1';
        $result=$this->Common_model->commonUpdate('categories',array('status'=>$updated_status),array('id'=>$id));	
        $insert_history = array("comment"=>"Category Status Changed","ip_address"=>$_SERVER['REMOTE_ADDR']);
          insert_history_project($insert_history);
          
	    (!empty($result)) ? $this->session->set_flashdata( 'success', 'Status Changed Successfully.' ) : $this->session->set_flashdata( 'error', 'Status Not Changed.' );
        redirect('master/category_list');
    }
  
    function sub_category_list(){
        $this->load->view("master/comman/header");
        $this->load->view("master/comman/left_sidebar");
        $data['records']=$this->Common_model->Get_sub_categories();
        if(!empty($_POST)){
		$delete_ids=$_POST['delete_ids'];
			$delete=$this->Common_model->commonMultiDelete('sub_categories',$delete_ids);	
			$insert_history = array("comment"=>"Sub Category Deleted","ip_address"=>$_SERVER['REMOTE_ADDR']);
          insert_history_project($insert_history);
			(!empty($delete)) ? $this->session->set_flashdata('success', 'Deleted Successfully...') : $this->session->set_flashdata('error', 'Not Deleted...');
			redirect('master/sub_category_list');
		}
		
		$this->load->view('master/master_data/sub_category_list',$data);
		$this->load->view("master/comman/footer");
    }
  
   function add_category(){
      
        $this->load->view("master/comman/header");
        $this->load->view("master/comman/left_sidebar");
        $data['records']=$this->Common_model->CommonRetrivedata('categories','*','',1);	
		
	   if (isset($_FILES['images']['name']) && $_FILES['images']['name'] != ''){ 
		    
		        $this->load->library('upload');
		        $this->upload->initialize($this->set_upload_options());
				$this->upload->do_upload("images");
				$dataInfo1 = $this->upload->data();
				
				// if($dataInfo1['image_width']<=165 && $dataInfo1['image_height']<=165){
				    $img_name = $dataInfo1['file_name'];
				// }else{
				//     $this->session->set_flashdata('error', 'Image height & width should be less than 165*165...');
				//     return false;
				// }
		 
		}
        
       	if(!empty($_POST)){
       	    $insert=array(
    			'category_name'=>$this->input->post("category_name"), 
    			'display_order'=>$this->input->post("display_order"), 
    			'cat_slug'=>$this->input->post("slug"), 
    			'image'=>($img_name!="") ? $img_name : "",
    			'status'=>1
    		);
    	
		$result=$this->Common_model->commonInsert('categories',$insert);
			$insert_history = array("comment"=>"Category Added","ip_address"=>$_SERVER['REMOTE_ADDR']);
          insert_history_project($insert_history);
		(!empty($result)) ? $this->session->set_flashdata('success', 'Added Successfully...') :$this->session->set_flashdata('error', 'Not Added...'); 
		 
		} 
       
		$this->load->view('master/master_data/add_category');
		$this->load->view("master/comman/footer");
  }
  
    private function set_upload_options(){  
        $config = array();
        $config['upload_path'] = './assets/images/category/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size']      = '0';
        $config['height']= "165";
        $config['width']= "165";
        $config['overwrite']     = FALSE;
        return $config;
    }
    
    private function set_upload_brand(){  
        $config = array();
        $config['upload_path'] = './assets/images/brand/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size']      = '0';
        $config['height']= "165";
        $config['width']= "165";
        $config['overwrite']     = FALSE;
        return $config;
    }
    
    
    function add_subcategory(){
        
        $this->load->view("master/comman/header");
        $this->load->view("master/comman/left_sidebar");
        $data['records']=$this->Common_model->CommonRetrivedata('sub_categories','*','',1);	
		if(!empty($_POST)){
			$insert=array(
			'category_id'=>$this->input->post("category_id"), 
			'sub_cat_name'=>$this->input->post("sub_cat_name"), 
			'display_order'=>$this->input->post("display_order"), 
			'status'=>1
		);
		$result=$this->Common_model->commonInsert('sub_categories',$insert);	
			$insert_history = array("comment"=>"Sub Category Added","ip_address"=>$_SERVER['REMOTE_ADDR']);
          insert_history_project($insert_history);
		(!empty($result)) ? $this->session->set_flashdata('success', 'Added Successfully...') :$this->session->set_flashdata('error', 'Not Added...'); 
	    echo "1";
		}
		$data['categories']=$this->Common_model->Get_categories();
       
		$this->load->view('master/master_data/add_subcategory',$data);
		$this->load->view("master/comman/footer");
    }
    
    
    
    function brand_listing(){
        
        $this->load->view("master/comman/header");
        $this->load->view("master/comman/left_sidebar");
        
        $data['records']=$this->Common_model->get_product_brand();
		
		if(!empty($_POST)){
	    	$delete_ids=$_POST['delete_ids'];
			$delete=$this->Common_model->commonMultiDelete('product_brand',$delete_ids);	
				$insert_history = array("comment"=>"Brand Listing deleted","ip_address"=>$_SERVER['REMOTE_ADDR']);
          insert_history_project($insert_history);
			(!empty($delete)) ? $this->session->set_flashdata('success', 'Deleted Successfully...'): $this->session->set_flashdata('error', 'Not Deleted...');
		}
        $this->load->view('master/master_data/brand_listing',$data);
		$this->load->view("master/comman/footer");
    }
    
    function brand_name_edit($id){
	    
	    $this->load->view("master/comman/header");
        $this->load->view("master/comman/left_sidebar");
		$data['record']  =$this->Common_model->CommonRetrivedata('product_brand','*',array('id'=>$id),2);
		
		if(!empty($_POST)){
		    
		  //  $str_name = str_replace(["!","(",")","*","®","/",",", "&", "@", "$", "_", "#","."],   "-",  $_POST['brand_name'] );
		    
		    if (isset($_FILES['images']['name']) && $_FILES['images']['name'] != ''){ 
		    
    		        $this->load->library('upload');
    		        $this->upload->initialize($this->set_upload_brand());
    				$this->upload->do_upload("images");
    				$dataInfo1 = $this->upload->data();
    			    $img_name = $_FILES['images']['name'];
    				
    		}else{
    		    $img_name = $this->input->post("display_order");
    		}
    		
    		 $update=array(
    			'brand_name'=>$this->input->post("brand_name"), 
    			'image'=>$img_name,
    			'display_order'=>$this->input->post("display_order"), 
    			'is_active'=>'1', 
    		);
		
	
			$this->db->where('id',$id);
			$result=$this->Common_model->commonUpdate('product_brand',$update,array('id'=>$id));
			
				$insert_history = array("comment"=>"Brand Name Updated","ip_address"=>$_SERVER['REMOTE_ADDR']);
                insert_history_project($insert_history);
		
		    (!empty($result)) ? $this->session->set_flashdata('success', 'updated Successfully...') : $this->session->set_flashdata('error', 'Not updated...');
			
		}
		$this->load->view('master/master_data/brand_name_edit',$data);	    
		$this->load->view("master/comman/footer");
    }
    
    public function brand_name_status($id,$status){
	    
		$updated_status=$status==1?'0':'1';
        $result=$this->Common_model->commonUpdate('product_brand',array('is_active'=>$updated_status),array('id'=>$id));
        $insert_history = array("comment"=>"Brand Name Status Changed","ip_address"=>$_SERVER['REMOTE_ADDR']);
                insert_history_project($insert_history);
	    (!empty($result)) ? $this->session->set_flashdata( 'success', 'Status Changed Successfully.' ) : $this->session->set_flashdata( 'error', 'Status Not Changed.' );
        redirect('master/brand_listing');
	}
	
	function brand_name_delete($id){
	
	
	    $insert_history = array("comment"=>"Brand Name Deleted","ip_address"=>$_SERVER['REMOTE_ADDR']);
       insert_history_project($insert_history);
	    $result=$this->Common_model->commonDelete('product_brand',array('id'=>$id));	
		(!empty($result)) ? $this->session->set_flashdata( 'success', 'Deleted Successfully...' ) : $this->session->set_flashdata( 'error', 'Not Deleted...' );
		 redirect('master/brand_listing');
    }
    
    function add_brand(){
        
        $data = array();
        $this->load->view("master/comman/header");
        $this->load->view("master/comman/left_sidebar");
        $data['records']=$this->Common_model->CommonRetrivedata('product_brand','*','',1);	
	
	 
	 	if (isset($_FILES['images']['name']) && $_FILES['images']['name'] != ''){ 
		    
		        $this->load->library('upload');
		        $this->upload->initialize($this->set_upload_brand());
				$this->upload->do_upload("images");
				$dataInfo1 = $this->upload->data();
			    $img_name = $_FILES['images']['name'];
				
		}
		
		
		
		if(!empty($_POST)){
			$insert=array(
			'brand_name'=>$this->input->post("brand_name"), 
			'image'=>$img_name,
			'display_order'=>$this->input->post("display_order"), 
			'is_active'=>'1'
		);
		$result=$this->Common_model->commonInsert('product_brand',$insert);	
		 $insert_history = array("comment"=>"Brand Name Added","ip_address"=>$_SERVER['REMOTE_ADDR']);
       insert_history_project($insert_history);
		(!empty($result)) ? $this->session->set_flashdata('success', 'Added Successfully...') :$this->session->set_flashdata('error', 'Not Added...'); 
	      echo "1";
		}
        
        $this->load->view('master/master_data/add_brand',$data);
		$this->load->view("master/comman/footer");
    }
    
    
  
}
  