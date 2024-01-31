<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    
     function __construct(){
           parent::__construct();
          $this->load->model(array('Login_model','Common_model','Product_model','Customer_model'));
          $this->load->helper(array('common_helper'));
      
  }
  
  function index(){
      
        $this->load->view("master/comman/header");
        $this->load->view("master/comman/left_sidebar");
        $data = array();
        // $data['customer_cnt']=$this->Customer_model->get_customer();
        // $data['product_cnt'] = $this->Product_model->get_product();
        // $data['pending_order_cnt'] = $this->Product_model->get_pending_order(array("order_status"=>0));
        // $data['total_order'] = $this->Product_model->get_pending_order();
        // $data['product_review'] = $this->Product_model->get_product_review(array("limit"=>5));
        
		$this->load->view('master/dashboard',$data);
		$this->load->view("master/comman/footer");
  }
  
  
}