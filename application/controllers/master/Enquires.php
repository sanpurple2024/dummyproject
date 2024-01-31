<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Enquires extends CI_Controller {
    
     function __construct(){
           parent::__construct();
          $this->load->model(array('Login_model','Common_model','Mail_template_model'));
          $this->load->helper(array('common_helper'));
      
  }
  
  
  public function  contact_us_enquiries_delete($id) {

		if(!empty($id)){
			$delete=$this->Common_model->commonDelete('contact_us',array('id'=>$id),'','');	
			if(!empty($delete)){
				$this->session->set_flashdata('success', 'Deleted Successfully...');
			}else{
				$this->session->set_flashdata('error', 'Not Deleted...');
			}
           redirect('master/ad_enquiries');
		}else{
           redirect('master/ad_enquiries');
		}
	}
	
	
  function enquiries_listing(){
      
        $this->load->view("master/comman/header");
        $this->load->view("master/comman/left_sidebar");
         $data['records']=$this->Common_model->get_all_enquiries();	
		 $data['contacted']=$this->Common_model->CommonRetrivedata('contact_us','*',array('status'=>1),1);	
		 $data['not_contacted']=$this->Common_model->CommonRetrivedata('contact_us','*',array('status'=>0),1);	
        if(!empty($_POST)){
		    $delete_ids=$_POST['delete_ids'];
			$delete=$this->Common_model->commonMultiDelete('contact_us',$delete_ids);	
			if(!empty($delete)){
				$this->session->set_flashdata('success', 'Deleted Successfully...');
			}else{
				$this->session->set_flashdata('error', 'Not Deleted...');
			}
           redirect('master/ad_enquiries');
		}
		$this->load->view('master/enquires/enquiries_listing',$data);
		$this->load->view("master/comman/footer");
  }
  
  
  function career_enquiries(){
      
        $this->load->view("master/comman/header");
        $this->load->view("master/comman/left_sidebar");
         $data['records']=$this->Common_model->get_all_carrier_enq();	
		 $data['contacted']=$this->Common_model->CommonRetrivedata('carrier','*',array('status'=>1),1);	
		 $data['not_contacted']=$this->Common_model->CommonRetrivedata('carrier','*',array('status'=>0),1);	
        if(!empty($_POST)){
		    $delete_ids=$_POST['delete_ids'];
			$delete=$this->Common_model->commonMultiDelete('carrier',$delete_ids);	
			if(!empty($delete)){
				$this->session->set_flashdata('success', 'Deleted Successfully...');
			}else{
				$this->session->set_flashdata('error', 'Not Deleted...');
			}
           redirect('master/career_enquiries');
		}
		$this->load->view('master/enquires/career_enquiries',$data);
		$this->load->view("master/comman/footer");
  }
  
  public function  career_enquiries_delete($id) {

		if(!empty($id)){
			$delete=$this->Common_model->commonDelete('carrier',array('id'=>$id),'','');	
			if(!empty($delete)){
				$this->session->set_flashdata('success', 'Deleted Successfully...');
			}else{
				$this->session->set_flashdata('error', 'Not Deleted...');
			}
           redirect('master/career_enquiries');
		}else{
           redirect('master/career_enquiries');
		}
	}
  
  
}