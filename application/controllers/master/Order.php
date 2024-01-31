<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {
    
     function __construct(){
           parent::__construct();
          $this->load->model(array('Login_model','Common_model','Mail_template_model'));
           $this->load->helper(array('common_helper'));
      
  }
  
 function change_cod_status(){
     
      $status = $this->input->post("status_value");
      $data_url = $this->input->post("data_url");
	  $order_id = $this->input->post("order_id");
	  $sts = ($status=="1") ? "1" : "0";
	  $update = array('order_status'=>$status,'payment_status'=>$status,'offline_payment_status'=>$sts);
	  $result = $this->Common_model->commonUpdate('orders_packages',$update,array('order_id'=>$order_id));
	  if($result){
	        $insert_history = array("comment"=>"COD Status Changed","ip_address"=>$_SERVER['REMOTE_ADDR']);
            insert_history_project($insert_history);
	      $this->session->set_flashdata('success', 'Status Changed  Successfully...');
	      echo $data_url;
	  }else{
	      $this->session->set_flashdata('error', 'Something went wrong');
	  }
 }
 
 function order_listing($order_status){
     
     $this->load->view("master/comman/header");
     $this->load->view("master/comman/left_sidebar");
     
     		$data['orders_by_status'][0]  =$this->Common_model->CommonRetrivedata('orders_packages','id',array('order_status'=>0,'payment_type'=>'0'),3);
		$data['orders_by_status'][1]  =$this->Common_model->CommonRetrivedata('orders_packages','id',array('order_status'=>1,'payment_type'=>'0'),3);
		$data['orders_by_status'][2]  =$this->Common_model->CommonRetrivedata('orders_packages','id',array('order_status'=>2,'payment_type'=>'0'),3);
		$data['orders_by_status'][3]  =$this->Common_model->CommonRetrivedata('orders_packages','id',array('order_status'=>3,'payment_type'=>'0'),3);
		
		$data['orders']=$this->Common_model->CommonRetrivedata('orders_packages','*',array('order_status'=>$order_status,'payment_type'=>'0'),1,array('id','DESC'));
		
	  
		    $data['cod'] = "" ;
		    if($order_status==0){
    			$data['orders_status_name']='Pending';
    		}elseif($order_status==1){
    			$data['orders_status_name']='Success';
    		}elseif($order_status==2){
    			$data['orders_status_name']='Failed';
    		}else{
    			$data['orders_status_name']='Refunded';
    		}
		
	



	    $data['orders_by_status_cod'][0]  =$this->Common_model->CommonRetrivedata('orders_packages','id',array('order_status'=>0,'payment_type'=>'1'),3);
		$data['orders_by_status_cod'][1]  =$this->Common_model->CommonRetrivedata('orders_packages','id',array('order_status'=>1,'payment_type'=>'1'),3);
		$data['orders_by_status_cod'][2]  =$this->Common_model->CommonRetrivedata('orders_packages','id',array('order_status'=>2,'payment_type'=>'1'),3);;
		$data['orders_by_status_cod'][3]  =$this->Common_model->CommonRetrivedata('orders_packages','id',array('order_status'=>3,'payment_type'=>'1'),3);
		
		
	
		
//      .......................................................................
		
	
		
		
		if(!empty($_POST)){
			$delete_ids=$_POST['delete_ids'];
		
			$delete=$this->Common_model->commonMultiDelete('orders_packages',$delete_ids);	
			if(!empty($delete)){
			     $insert_history = array("comment"=>"Order Deleted","ip_address"=>$_SERVER['REMOTE_ADDR']);
            insert_history_project($insert_history);
				$this->session->set_flashdata('success', 'Deleted Successfully...');
			}else{
				$this->session->set_flashdata('error', 'Not Deleted...');
			}
	
			
		}
		$data['order_status'] = $order_status;
     
     
     $data['order_status'] = $order_status;
     $this->load->view('master/order/order_listing',$data);
	 $this->load->view("master/comman/footer");
 }
 
    public function orders_invoice($order_id,$order_status){
        
         $this->load->view("master/comman/header");
         $this->load->view("master/comman/left_sidebar");
         
		$data['invoice_type']=0;
		$data['record']=$this->Common_model->CommonRetrivedata('orders_packages','*',array('id'=>$order_id),2);
		
		$data['record_product']=$this->Common_model->check_order($order_id);
		$data['web_settings']=$this->Common_model->CommonRetrivedata('web_settings','*',array('id'=>1),2);
		$this->load->view('master/order/invoice',$data);	    
		$this->load->view("master/comman/footer");
	}
 
 
     public function download_order($id=null){
         
		$data['record']=$this->Common_model->CommonRetrivedata('orders_packages','*',array('id'=>$id),2);
		
		$data['record_product']=$this->Common_model->check_order($id);
		$data['web_settings']=$this->Common_model->CommonRetrivedata('web_settings','*',array('id'=>1),2);
		$data['invoice_type']=0;
		
		if($data['record']!=null){
			$html=$this->load->view('master/order/invoice-print',$data);
			$pdfFilePath = "Invoice_".$data['record']['id'].".pdf";
			$this->load->library('m_pdf');
			$this->m_pdf->pdf->SetFont('times', 'BI', 20, '', 'false');
			$aa = $this->m_pdf->pdf->WriteHTML($html);
			$this->m_pdf->pdf->Output($pdfFilePath, "D"); 
		}
	}
	
    public function order_cod_delete($id,$order_status){
	    	$result=$this->Common_model->commonDelete('orders_packages',array('id'=>$id));
	    	
	    	 $insert_history = array("comment"=>"COD Deleted","ip_address"=>$_SERVER['REMOTE_ADDR']);
            insert_history_project($insert_history);
            
            
		(!empty($result))? $this->session->set_flashdata( 'success', 'Deleted Successfully...' ) : $this->session->set_flashdata( 'error', 'Not Deleted...' );
		 redirect('master/cod_listing/'.$order_status.'?cod=true');
	}
 
    public function order_delete($id,$order_status){
        
        $insert_history = array("comment"=>"Order Deleted","ip_address"=>$_SERVER['REMOTE_ADDR']);
        insert_history_project($insert_history);
        
		$result=$this->Common_model->commonDelete('orders_packages',array('id'=>$id));	
		(!empty($result))? $this->session->set_flashdata( 'success', 'Deleted Successfully...' ) : $this->session->set_flashdata( 'error', 'Not Deleted...' );
			
		redirect('master/order_listing/'.$order_status);
	}
    public function order_invoice($order_id){
        
         $this->load->view("master/comman/header");
         $this->load->view("master/comman/left_sidebar");
         
		$data['invoice_type']=0;
		$data['record']=$this->Common_model->CommonRetrivedata('orders_packages','*',array('id'=>$order_id),2);
		
		$data['record_product']=$this->Common_model->check_order($order_id);
		$data['web_settings']=$this->Common_model->CommonRetrivedata('web_settings','*',array('id'=>1),2);
		$this->load->view('master/order/invoice',$data);	    
		$this->load->view("master/comman/footer");
	}
  function cod_listing($order_status){
      
        $this->load->view("master/comman/header");
        $this->load->view("master/comman/left_sidebar");
       	
		$data['orders_by_status'][0]  =$this->Common_model->CommonRetrivedata('orders_packages','id',array('order_status'=>0,'payment_type'=>'0'),3);
		$data['orders_by_status'][1]  =$this->Common_model->CommonRetrivedata('orders_packages','id',array('order_status'=>1,'payment_type'=>'0'),3);
		$data['orders_by_status'][2]  =$this->Common_model->CommonRetrivedata('orders_packages','id',array('order_status'=>2,'payment_type'=>'0'),3);
		$data['orders_by_status'][3]  =$this->Common_model->CommonRetrivedata('orders_packages','id',array('order_status'=>3,'payment_type'=>'0'),3);
		
		$data['orders']=$this->Common_model->CommonRetrivedata('orders_packages','*',array('order_status'=>$order_status,'payment_type'=>'0'),1,array('id','DESC'));
		
		
		
// 		...................COD...............................................

	  if($this->input->get_post("cod")=="true"){
		    if($order_status==00){
		        $or_status = "0";
    			$data['orders_status_name']='COD Pending';
    			$data['page_title'] = "COD Pending";
    		}elseif($order_status==11){
    		    $or_status = "1";
    			$data['orders_status_name']='COD Success';
    			$data['page_title'] = "COD Confirmed";
    		}elseif($order_status==22){
    		    $or_status = "2";
    			$data['orders_status_name']='COD Failed';
    			$data['page_title'] = "COD Failed";
    		}else{
    		    $or_status = "3";
    			$data['orders_status_name']='COD Refunded';
    			$data['page_title'] = "COD Refunded";
    		}
		    $data['cod'] = $this->input->get_post("cod") ;
		}



	    $data['orders_by_status_cod'][0]  =$this->Common_model->CommonRetrivedata('orders_packages','id',array('order_status'=>0,'payment_type'=>'1'),3);
		$data['orders_by_status_cod'][1]  =$this->Common_model->CommonRetrivedata('orders_packages','id',array('order_status'=>1,'payment_type'=>'1'),3);
		$data['orders_by_status_cod'][2]  =$this->Common_model->CommonRetrivedata('orders_packages','id',array('order_status'=>2,'payment_type'=>'1'),3);;
		$data['orders_by_status_cod'][3]  =$this->Common_model->CommonRetrivedata('orders_packages','id',array('order_status'=>3,'payment_type'=>'1'),3);
		
		
		$data['orders_cod']=$this->Common_model->CommonRetrivedata('orders_packages','*',array('order_status'=>$or_status,'payment_type'=>'1'),1,array('id','DESC'));
	
		
//      .......................................................................
		
	
		
		
		if(!empty($_POST)){
			$delete_ids=$_POST['delete_ids'];
		
			$delete=$this->Common_model->commonMultiDelete('orders_packages',$delete_ids);	
			if(!empty($delete)){
				$this->session->set_flashdata('success', 'Deleted Successfully...');
			}else{
				$this->session->set_flashdata('error', 'Not Deleted...');
			}

			
		}
		$data['order_status'] = $order_status;
      	$this->load->view('master/order/cod_listing',$data);
		$this->load->view("master/comman/footer");
      
  }
  

    
  
  
}