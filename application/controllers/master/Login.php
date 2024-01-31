<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    
     function __construct(){
           parent::__construct();
          $this->load->model(array('Common_model','Mail_template_model','Login_model'));
          $this->load->helper(array('common_helper'));
//   $this->load->library('IP2Location_lib');
  }
  
  
    
    function logout(){
        $insert_history = array("comment"=>"Admin Profile Logout","ip_address"=>$_SERVER['REMOTE_ADDR']);
        // insert_history_project($insert_history);
        $this->session->sess_destroy();
        
        redirect(base_url().'master/login');
    }
    
	public function index(){
	    
	   // $this->load->view("master/comman/header");
		$this->load->view('master/login');
		$this->load->view("master/comman/footer");
	}
	
	public function login_check(){
	    
	    $username=str_replace(" ","", $this->input->post("username"));
		$password=str_replace(" ","", $this->input->post("password"));
		$user_data=$this->Login_model->check_username_password();
		
		 if(!empty($user_data)){
		     
		     $role_data=$this->Common_model->CommonRetrivedata('roles','`id`,`role_type`,`permissions`',array('id'=>$user_data['role_id']),2);	
		     
		     
		                $this->session->set_userdata('user','admin');
					    $this->session->set_userdata('user_type',$user_data['user_type']);
						$this->session->set_userdata('user_id',$user_data['id']);
						$this->session->set_userdata('role_id',$user_data['role_id']);
						$this->session->set_userdata('role_type',$role_data['role_type']);
						$this->session->set_userdata('role_permissions',$role_data['permissions']);
						$this->session->set_userdata('login_date_time',date('Y-m-d H:i:s'));
						$details = $this->Login_model->update_login($role_data['id'],$user_data);
						
						/* START Mail & SMS END */
					   $current_ip_address =  $_SERVER['REMOTE_ADDR'];
					   $sms_template_id=1;
					   $controller=4;
					   $email_temp_id=3;
					   $our_ip_addresses=$this->Common_model->CommonRetrivedata('our_ip_addresses','*',array('ip_address'=>trim($current_ip_address)),2);
					   $our_ip_addresses=$this->Common_model->CommonRetrivedata('our_ip_addresses','*',array('ip_address'=>trim($current_ip_address)),2);
		               if(!empty($our_ip_addresses)){
						   $login_name=$our_ip_addresses['name'];
					   }else{
						   $login_name='Unknown';
					   }
					   $array_data=array(
		               	"{USERNAME}"=>$username,
		               	"{PASSWORD}"=>$password,
		               	"{NAME}"=>$user_data['name'],
		                "{IP_ADDRESS}"=>$current_ip_address,
		                "{LOGIN_NAME}"=>$login_name,
		                "{HOSTNAME}"=>$_SERVER['HTTP_HOST'],
		                "{LOGIN_DATE}" => Dateconversion(date('d-m-Y')),
						"{LOGIN_TIME}" => Timeconversion(date('H:i:s')),
		               );
		               $sms_email=$this->Mail_template_model->send_mail_sms($user_data['user_type'],$controller,$email_temp_id,$sms_template_id,$array_data,$user_data['name'],$user_data['email'],$user_data['mobile'],1);
		                /*END Mail & SMS END */
						$this->session->set_flashdata( 'success', 'Login Successfully...' );
						$insert_history = array("comment"=>"Admin Profile Logged","ip_address"=>$_SERVER['REMOTE_ADDR']);
                        // insert_history_project($insert_history);
				// 		redirect(base_url().'master/dashboard');
				echo "1";
		     
		 }else{
		     $this->session->set_flashdata( 'error', 'Invalid credentails...' );
		      //redirect(base_url().'master/login');
		      echo "2";
		     
		 }
	    
	}
	
	function admin_logout(){
	    $insert_history = array("comment"=>"Admin Profile Logout","ip_address"=>$_SERVER['REMOTE_ADDR']);
        insert_history_project($insert_history);
	    session_unset();
	    
    	$this->session->set_flashdata('error', 'Logout Successfully...');
    	redirect(base_url().'master/login');
	}
	
	function master_forget_password(){
	    $this->load->view('master/forget_password');
		$this->load->view("master/comman/footer");
	}
	
	function admin_forget_pwd(){
	    
	    $user_data=$this->Login_model->check_details();
	    
			 if(!empty($user_data)){
			     
			     $new_password=Genearate_Password();
			     $data = array(
						'password'	 => encode5t($new_password),
						'password_updated_date_time'	 => date('Y-m-d H:i:s'),
					);
				$this->db->where('id',$user_data['id']);	
	            $result=$this->db->update('admins', $data);
	             /* START Mail & SMS END */
			   $user_email = ($user_data['user_type']==0) ? $user_data['user_name'] : $user_data['email'];
			   
			   $controller=1;
			   $sms_template_id=2;
			   $email_temp_id=4;
               $array_data=array(
               "{NAME}"=>$user_data['name'],
               	"{EMAIL}"=>$user_email,
               	"{MOBILE}"=>$user_data['mobile'],
               	"{PASSWORD}"=>$new_password,
               );
               $sms_email=$this->Mail_template_model->send_mail_sms($user_data['user_type'],$controller,$email_temp_id,$sms_template_id,$array_data,$user_data['name'],$user_data['email'],$user_data['mobile']);
               /* END Mail & SMS END */
				    if(!empty($result)){
				        
				        $insert_history = array("comment"=>"Admin Password Reset","ip_address"=>$_SERVER['REMOTE_ADDR']);
                        insert_history_project($insert_history);
				        
				        echo "1";
						  // $this->session->set_flashdata('success', 'Password Reset Successfully. New Password Sent your register Email Id /Mobile No' );
							 //redirect(base_url().'master/login');
					}else{
					    echo "2";
						  //$this->session->set_flashdata( 'error', 'Invalid Email Id / Mobile No.' );
						  //redirect(base_url().'master/login/forgot_password');
					 }
			     
			 }else{
			     echo "fff";
			 }
	    
	}
}
