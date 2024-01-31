<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Web_settings extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model(array('Common_model'));
	}
	public function index(){
    	
    		$this->load->view("master/comman/header");
    	    $this->load->view("master/comman/left_sidebar");
    	    $data['record']= $this->Common_model->CommonRetrivedata('web_settings','`id`, `host_name`, `logo`, `logo_alt_tag`, `favicon`,  `mail_template_admin_email`, `mail_template_admin_mobile`',array('id'=>1),2);	
    		$this->load->view('master/web_settings/web_settings',$data);
    		$this->load->view("master/comman/footer");
    		
	}
	
	function ad_submit_web_setting(){
	    
	 	if(!empty($_POST)){
    	    
    	    $data['record']= $this->Common_model->CommonRetrivedata('web_settings','`id`, `host_name`, `logo`, `logo_alt_tag`, `favicon`, `mail_template_admin_email`, `mail_template_admin_mobile`',array('id'=>1),2);	
    		$old_logo=$data['record']['logo'];
    		$old_favicon=$data['record']['favicon'];
    	    
    	    $id = "1";
    	    if ($_FILES['logo']['name'] != '') {
				$image_name='logo';$folder_name='logo';
				$logo=$this->Common_model->CommonImageUpload($image_name,$folder_name,$height='66',$width='247');	
			}else{
				$logo=$old_logo;
			}
			if ($_FILES['favicon']['name'] != '') {
				$image_name='favicon';$folder_name='logo';
				$favicon=$this->Common_model->CommonImageUpload($image_name,$folder_name,$height='50',$width='50');	
			}else{
				$favicon=$old_favicon;
			}
			$update=array(
				'mail_template_admin_email'=>$this->input->post("mail_template_admin_email"),
				'mail_template_admin_mobile'=>$this->input->post("mail_template_admin_mobile"),
				'host_name'=>$this->input->post("host_name"),
				'logo'=>$logo,
				'logo_alt_tag'=>$this->input->post("logo_alt_tag"),
				'favicon'=>$favicon,
			);
			
			$this->db->where('id',$id);
			$result=$this->db->update('web_settings',$update);
			if(!empty($result)){
				if ($_FILES['logo']['name'] != '') {	$this->Common_model->remove_old_image($old_logo,$folder_name);}
				if ($_FILES['favicon']['name'] != '') { $this->Common_model->remove_old_image($old_favicon,$folder_name);	}
				$this->session->set_flashdata('success', 'Updated Successfully...');
				 echo "1";
				//  redirect("master/dashboard");
			}else{
				$this->session->set_flashdata('error', 'Not Updated...');
				echo "2";
			}
    	    
    	}
    	    
    	    
	}

	
}