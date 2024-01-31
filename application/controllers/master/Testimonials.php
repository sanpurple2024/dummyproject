<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testimonials extends CI_Controller {
    
     function __construct(){
          parent::__construct();
          $this->load->model(array('Login_model','Common_model','Mail_template_model'));
          $this->load->helper(array('common_helper'));
  }
  
  function testimonials_listing(){
      
        $this->load->view("master/comman/header");
        $this->load->view("master/comman/left_sidebar");
        $data['records'] = $this->Common_model->Get_testimonials();
		
		if(!empty($_POST)){
		    $delete_ids = $_POST['delete_ids'];
			$delete=$this->Common_model->commonMultiDelete('testimonials',$delete_ids);	
			 $insert_history = array("comment"=>"Testimonials Deleted","ip_address"=>$_SERVER['REMOTE_ADDR']);
             insert_history_project($insert_history);
			(!empty($delete)) ? $this->session->set_flashdata('success', 'Deleted Successfully...') : $this->session->set_flashdata('error', 'Not Deleted...');
			redirect('master/ad_testimonials_listing');
		}
		$this->load->view('master/testimonials/testimonials_listing',$data);
		$this->load->view("master/comman/footer");
  }
  
   public function testimonials_add(){
	    
        $this->load->view("master/comman/header");
        $this->load->view("master/comman/left_sidebar");
		$data['records']=$this->Common_model->CommonRetrivedata('testimonials','*','',1);	
		if(!empty($_POST)){
			$insert=array(
    			'client_name'=>$this->input->post("client_name"), 
    			'client_message'=>$this->input->post("client_message"),
    			'status'=>1
		   );
		$result=$this->Common_model->commonInsert('testimonials',$insert);	
		$insert_history = array("comment"=>"Testimonials Added","ip_address"=>$_SERVER['REMOTE_ADDR']);
             insert_history_project($insert_history);
		(!empty($result)) ? $this->session->set_flashdata('success', 'Added Successfully...') :$this->session->set_flashdata('error', 'Not Added...'); 
	
		}
		$this->load->view('master/testimonials/testimonials_add');
		$this->load->view("master/comman/footer");
	}
	
	public function testimonials_edit($id){
	    
		$this->load->view("master/comman/header");
        $this->load->view("master/comman/left_sidebar");
		$data['record']  =$this->Common_model->CommonRetrivedata('testimonials','*',array('id'=>$id),2);
	
		if(!empty($_POST)){
		
		  $update=array(
			     'client_name'=>$this->input->post("client_name"), 
    			 'client_message'=>$this->input->post("client_message"),
    			 'status'=>1
		  );
			$this->db->where('id',$id);
			$result=$this->Common_model->commonUpdate('testimonials',$update,array('id'=>$id));
			
			$insert_history = array("comment"=>"Testimonials Updated","ip_address"=>$_SERVER['REMOTE_ADDR']);
             insert_history_project($insert_history);
		    (!empty($result)) ? $this->session->set_flashdata('success', 'updated Successfully...') : $this->session->set_flashdata('error', 'Not updated...');
			 redirect('master/testimonials/testimonials_listing');
		}    
		$this->load->view('master/testimonials/testimonials_edit',$data);
		$this->load->view("master/comman/footer");
	}
	
	
	function testimonials_delete($id){
	    
	   $result=$this->Common_model->commonDelete('testimonials',array('id'=>$id));	
	   
	   	$insert_history = array("comment"=>"Testimonials Deleted","ip_address"=>$_SERVER['REMOTE_ADDR']);
             insert_history_project($insert_history);
		(!empty($result)) ? $this->session->set_flashdata( 'success', 'Deleted Successfully...' ) : $this->session->set_flashdata( 'error', 'Not Deleted...' );
		 redirect('master/ad_testimonials_listing');
    }
    
    
     public function testimonials_status($id,$status){
	    
		$updated_status=$status==1?'0':'1';
        $result=$this->Common_model->commonUpdate('testimonials',array('status'=>$updated_status),array('id'=>$id));
        $insert_history = array("comment"=>"Testimonials Status Changed","ip_address"=>$_SERVER['REMOTE_ADDR']);
             insert_history_project($insert_history);
	    (!empty($result)) ? $this->session->set_flashdata( 'success', 'Status Changed Successfully.' ) : $this->session->set_flashdata( 'error', 'Status Not Changed.' );
        redirect('master/ad_testimonials_listing');
	}
    
    
  
  
}