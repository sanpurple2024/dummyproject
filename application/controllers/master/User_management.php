<?php 
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User_management extends CI_Controller {
  
   function __construct(){
        parent::__construct();
       $this->load->model(array('Common_model','Mail_template_model'));
       $this->load->helper(array('password_helper','common_helper'));
   }
 //****************************************************************
 
   function admin_history(){
        $this->load->view("master/comman/header");
	    $this->load->view("master/comman/left_sidebar");
	    	
	    $data['records']=$this->Common_model->CommonRetrivedata('history_project','*','',1,'DESC');
	    $this->load->view('master/user_management/admin_history',$data);
		$this->load->view("master/comman/footer");
   }
   
//******************************************************************	

    function ad_change_password(){
	    
	    $this->load->view("master/comman/header");
	    $this->load->view("master/comman/left_sidebar");
	    
	   // $data['role_permissions']=json_decode($this->session->userdata['role_permissions'],TRUE);
		$user_id = $this->session->userdata('user_id');
		$user_data = $data['user_data']=$this->Common_model->CommonRetrivedata('admins','*',array('id'=>$user_id),2);	
		
		
		
		if(!empty($_POST)){
			    $old_password = $this->input->post('cur_pwd');
				$password_data=$this->Common_model->password_check($user_data['id'],encode5t($old_password));
			
				
						if(!empty($password_data)){
                         $new_password = ($this->input->post('conf_pwd'));
    						$update = array(        
    						'password'=>encode5t($new_password),		 
    						'updated_date_time'=>date('y-m-d H:i:s'),  
    						'password_updated_date_time'=>date('y-m-d H:i:s'),  
    						);           
					        $changepass=$this->Common_model->commonUpdate('admins',$update,array('id'=>$user_data['id']));
					        
					        
					        
					      
		
    						if(!empty($changepass)){
    						
    								/* START Mail & SMS END */
        					       if($user_data['user_type']==0){
            			                $user_email=$user_data['user_name'];
            			                $user_name=$user_data['name'];
        						   }else{
            			                $user_email=$user_data['email'];
            			                $user_name=$user_data['name'];
        						   }
    						   $controller=2;
    						   $sms_template_id=4;						   
    						   $email_temp_id=6;
    			               $array_data=array(
    			               	"{NAME}"=>$user_name,
    			               	"{EMAIL}"=>$user_email,
    			               	"{MOBILE}"=>$user_data['mobile'],
    			               	"{PASSWORD}"=>$new_password,
    			               );
    			               $sms_email=$this->Mail_template_model->send_mail_sms($user_data['user_type'],$controller,$email_temp_id,$sms_template_id,$array_data,$user_name,$user_data['email'],$user_data['mobile']);
    		                  
                                  $this->session->set_flashdata('success', 'Password has been Changed Successfully...');
                                  
                                  $insert_history = array("comment"=>"Admin Password Changed","ip_address"=>$_SERVER['REMOTE_ADDR']);
                                  insert_history_project($insert_history);
                                  
                                  
                                  echo "1";
    						}else{
                                 $this->session->set_flashdata('error', 'Please Try Again.');
                                 echo "44";
    						}
						}else{		
							$this->session->set_flashdata('error', 'Current Password is wrong');
							echo "2";
						}
						
				  }
		
		$this->load->view('master/user_management/admin_change_password',$data);	    
		$this->load->view("master/comman/footer");
	}
	
  //***********************************************************************************************************	


    function admin_edit_profile(){
        
        
        $this->load->view("master/comman/header");
	    $this->load->view("master/comman/left_sidebar");
        
        $data['role_permissions']=json_decode($this->session->userdata['role_permissions'],TRUE);
		$user_id = $this->session->userdata('user_id');
		$user_data = $data['user_data']=$this->Common_model->CommonRetrivedata('admins','*',array('id'=>$user_id),2);
		
		if(!empty($_POST)){
		    
			  
			     $update = array(        
								'user_name'=>$this->input->post('conf_username'),		 
								'user_name_updated_date_time'=>date('y-m-d H:i:s'),  
								'updated_date_time'=>date('y-m-d H:i:s'),  
								'mobile'=>$this->input->post('conf_mobile'),
								'email'=>$this->input->post('email')
								);
				$change = $this->Common_model->commonUpdate('admins',$update,array('id'=>$user_data['id']));
			    if(!empty($change)){
			         $insert_history = array("comment"=>"Admin Profile Updated","ip_address"=>$_SERVER['REMOTE_ADDR']);
                     insert_history_project($insert_history);
			        $this->session->set_flashdata('success', 'Profile Updated Successfully...');
			    }else{
			        $this->session->set_flashdata('error', 'Please Try Again.');
			    }
						
			    
		}
        
        $this->load->view('master/user_management/admin_edit_profile',$data);	    
		$this->load->view("master/comman/footer");
    }
    
    
 //***********************************************************************************************************	
 
 
}