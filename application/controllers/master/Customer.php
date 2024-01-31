<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {
    
     function __construct(){
           parent::__construct();
          $this->load->model(array('Login_model','Common_model','Mail_template_model','Customer_model'));
          $this->load->helper(array('common_helper'));
      
  }
  
  function change_password($id){
      
      $this->load->view("master/comman/header");
      $this->load->view("master/comman/left_sidebar");
      $data['id'] = $id;
      
      	
		if(!empty($_POST)){
		    $data['new_pwd'] = $this->input->post('new_pwd');
		    $data['conf_pwd'] = $this->input->post('conf_pwd');
		    
		    if($data['conf_pwd']==$data['new_pwd']) {
		      $update['password'] = base64_encode($data['conf_pwd']);
		      $result = $this->Common_model->commonUpdate('customer',$update,array('id'=>$id));
		      (!empty($result)) ? $this->session->set_flashdata('success', 'Password updated Successfully...') : $this->session->set_flashdata('error', 'Not updated...');
		   
		    }else{
		       $this->session->set_flashdata('error', 'Confirm password & new password should not be match');  
		    }
		   
		    
		}
      	
      	
      
      $this->load->view('master/customer/change_password',$data);
		$this->load->view("master/comman/footer");
  }
  
  function ad_customer_listing(){
      
        $this->load->view("master/comman/header");
        $this->load->view("master/comman/left_sidebar");
        $data['records']=$this->Customer_model->get_customer();
        
		if(!empty($_POST)){
		    $delete_ids=$_POST['delete_ids'];
			$delete=$this->Common_model->commonMultiDelete('customer',$delete_ids);
			  $insert_history = array("comment"=>"Customer Deleted","ip_address"=>$_SERVER['REMOTE_ADDR']);
            insert_history_project($insert_history);
			(!empty($delete)) ? $this->session->set_flashdata('success', 'Deleted Successfully...') : $this->session->set_flashdata('error', 'Not Deleted...');
			redirect('master/customer/customer_listing');
		}
		$this->load->view('master/customer/customer_listing',$data);
		$this->load->view("master/comman/footer");
  }
  
  function add_customer(){
       $this->load->view("master/comman/header");
       $this->load->view("master/comman/left_sidebar");
        $data['records']=$this->Common_model->CommonRetrivedata('customer','*','',1);	
		if(!empty($_POST)){
		    
		    if(!empty($_FILES)){
			
				$this->load->library('upload');
				$dataInfo = array();
				$cpt = count($_FILES['customer_image']['name']);
				$files = $_FILES;
				$insert_img = array();
				for($i=0; $i<$cpt; $i++){
					$filenameArray =explode('.',$files['customer_image']['name']);
					$new_count = $i+1;
					$_FILES['customer_image']['name'] = $files['customer_image']['name'];
					$_FILES['customer_image']['type']= $files['customer_image']['type'];
					$_FILES['customer_image']['tmp_name']= $files['customer_image']['tmp_name'];
					$_FILES['customer_image']['error']= $files['customer_image']['error'];
					$_FILES['customer_image']['size']= $files['customer_image']['size'];   

					$this->upload->initialize($this->set_upload_options());
					$this->upload->do_upload("customer_image");
					$dataInfo = $this->upload->data();
			
					if(!empty($dataInfo)){
					  $insert_img[] = $files['customer_image']['name'];
					} 
				}
			}else{
				$this->session->set_flashdata('error', 'Sorry. At least one Photo is required.');
			
			}
           $img_name = 	(is_array($insert_img)) ? implode(",", $insert_img) : "";
		
			$insert=array(
    			'name'=>$this->input->post('customer_name'), 
    			'email'=>$this->input->post('email'), 
    			'mobile'=>$this->input->post('mobile'), 
    			'gender'=>$this->input->post('gender'), 
    			'customer_image'=>$img_name,
    			'address_first'=>$this->input->post('address_first'), 
    			'address_second'=>($this->input->post('address_second')!="") ? $this->input->post('address_second') : "",
    			'address_third'=>($this->input->post('address_third')!="") ? $this->input->post('address_third') : "",
    			'country'=>$this->input->post('country'), 
    			'state'=>$this->input->post('state'), 
    			'city'=>$this->input->post('city'), 
    			'dob'=>$this->input->post('dob'), 
    			'password'=>base64_encode($this->input->post('password')),
    			'post_code'=>$this->input->post('post_code'), 
    			'status'=>1,
    			'my_referal_code'=>substr(sha1(rand()), 0, 5),
    			'from_referal_code'=>$this->input->post('from_referal_code'), 
    		);
    		
    	

		$result=$this->Common_model->commonInsert('customer',$insert);
		if($result){
		 $insert_history = array("comment"=>"Customer Added","ip_address"=>$_SERVER['REMOTE_ADDR']);
            insert_history_project($insert_history);
		}
		
		(!empty($result))? $this->session->set_flashdata('success', 'Added Successfully...') : $this->session->set_flashdata('error', 'Not Added...');
		
		}
		$data['country']=$this->Common_model->get_country();
        
      $this->load->view('master/customer/add_customer',$data);
	  $this->load->view("master/comman/footer");
  }
  
  
   function edit_customer($id){
       
       $this->load->view("master/comman/header");
       $this->load->view("master/comman/left_sidebar");
       $data['record']  =$this->Common_model->CommonRetrivedata('customer','*',array('id'=>$id),2);
	
	
	if(!empty($_POST)){
		    
		    if(strlen($_POST['mobile'])==10){
		     if($_FILES['customer_image']['name']){
			
				$this->load->library('upload');
				$dataInfo = array();
				$cpt = count($_FILES['customer_image']['name']);
				$files = $_FILES;
				$insert_img = array();
				for($i=0; $i<$cpt; $i++){
					$filenameArray =explode('.',$files['customer_image']['name']);
					$new_count = $i+1;
					$_FILES['customer_image']['name'] = $files['customer_image']['name'];
					$_FILES['customer_image']['type']= $files['customer_image']['type'];
					$_FILES['customer_image']['tmp_name']= $files['customer_image']['tmp_name'];
					$_FILES['customer_image']['error']= $files['customer_image']['error'];
					$_FILES['customer_image']['size']= $files['customer_image']['size'];   

					$this->upload->initialize($this->set_upload_options());
					$this->upload->do_upload("customer_image");
					$dataInfo = $this->upload->data();
			
					if(!empty($dataInfo)){
					  $insert_img[] = $files['customer_image']['name'];
					} 
					
				}
			
				$img_name = 	(is_array($insert_img) && !empty($insert_img)) ? implode(",", $insert_img) : "";
			
			}else{
				$img_name = $this->input->post('hidden_img');
			}
         
        
		 		$update =array(
    			'name'=>$this->input->post('customer_name'), 
    			'email'=>$this->input->post('email'), 
    			'mobile'=>$this->input->post('mobile'), 
    			'gender'=>$this->input->post('gender'), 
    			'customer_image'=>$img_name,
    			'address_first'=>$this->input->post('address_first'), 
    			'address_second'=>($this->input->post('address_second')!="") ? $this->input->post('address_second') : "",
    			'address_third'=>($this->input->post('address_third')!="") ? $this->input->post('address_third') : "",
    			'country'=>$this->input->post('country'), 
    			'state'=>$this->input->post('state'), 
    			'city'=>$this->input->post('city'), 
    			'dob'=>$this->input->post('dob'), 
    // 			'password'=>base64_encode($this->input->post('password')),
    			'post_code'=>$this->input->post('post_code'), 
    			'status'=>1,
    			'my_referal_code'=>substr(sha1(rand()), 0, 5),
    			'from_referal_code'=>$this->input->post('from_referal_code'), 
    		);
    	
			$this->db->where('id',$id);
			$result=$this->Common_model->commonUpdate('customer',$update,array('id'=>$id));
		   (!empty($result)) ? $this->session->set_flashdata('success', 'updated Successfully...') : $this->session->set_flashdata('error', 'Not updated...');
			 redirect('master/ad_customer_listing');
			 
		    }else{
		     $this->session->set_flashdata('error', 'Mobile number allowed only 10 digit'); 
		     redirect('master/ad_customer_listing');
		}
		}
		
		
		
		$data['country']=$this->Common_model->get_country();
		$data['state']=$this->Common_model->get_state();
		$data['city']= $this->Common_model->get_cities();
	
      $this->load->view('master/customer/edit_customer',$data);
	  $this->load->view("master/comman/footer");
  }
  
  
   private function set_upload_options(){  
        $config = array();
        $config['upload_path'] = './assets/images/customer/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size']      = '0';
        $config['overwrite']     = FALSE;
        return $config;
    }
  
  
 public function get_state(){
        
        $country_id = $this->input->post("val");
        $cn_name= $this->Common_model->get_country(array("country_name"=>$country_id));
     
        
        if(!empty($cn_name)){
            $subcat= $this->Common_model->get_state(array("country_id"=>$cn_name[0]['id']));
            
            
            $html = "";
            $html.="<select id='state_change' name='state' class='form-control'>";
            $html.="<option >Select State</option>";
            if(count($subcat)>0){
                foreach($subcat AS $state){
                    $html.="<option value=".$state['state_name'].">".$state['state_name']."</option>";
                }
            }
            $html.="</select>";
            echo $html;
        }
       
    }
    
      public function get_city(){
        
        $state_id = $this->input->post("val");
        $cn_name= $this->Common_model->get_state(array("state_name"=>$state_id));
      
        if(!empty($state_id)){
            $subcat= $this->Common_model->get_cities(array("state_id"=>$cn_name[0]['id']));
            
            $html = "";
            $html.="<select id='city_change' name='city' class='form-control'>";
            $html.="<option >Select City</option>";
            if(count($subcat)>0){
                foreach($subcat AS $city){
                    $html.="<option value=".$city['city_name'].">".$city['city_name']."</option>";
                }
            }
            $html.="</select>";
            echo $html;
        }
       
    }
    
    
    public function change_customer_status($id,$status){
	    
	    $updated_status=$status==1?'0':'1';
        $result=$this->Common_model->commonUpdate('customer',array('status'=>$updated_status),array('id'=>$id));	
	    (!empty($result)) ? $this->session->set_flashdata( 'success', 'Status Changed Successfully.' ) : $this->session->set_flashdata( 'error', 'Status Not Changed.' );
         redirect('master/ad_customer_listing');
	}
    public function change_customer_delete($id){
	    $result=$this->Common_model->commonDelete('customer',array('id'=>$id));	
		(!empty($result)) ? $this->session->set_flashdata( 'success', 'Deleted Successfully...' ) : $this->session->set_flashdata( 'error', 'Not Deleted...' );
		 redirect('master/ad_customer_listing');
	}
  
  
}