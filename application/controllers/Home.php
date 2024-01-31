<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    
    function __construct(){
           parent::__construct();
          $this->load->model(array('Common_model'));
          $this->load->helper(array('common_helper'));
      
  }
    
	public function index(){
	    
	    $this->load->view("frontend/comman/header");
		$this->load->view('home');
		$this->load->view("frontend/comman/footer");
		
	}
	
	function login_admin(){
	  redirect('master/login');
	}
	
	function subscribe_submit(){
	    $data['email'] = $this->input->post("email");
	    
	    if($data['email']!=""){
	        $result=$this->Common_model->commonInsert('newsletter',$data);
	        echo ($result) ? "1" : "2";
	    }
	}
	
	function requirement(){
	    
	    $this->load->view("frontend/comman/header");
	   // $data['records']=$this->Common_model->CommonRetrivedata('faqs','*',array('status'=>1),1);
		$this->load->view('frontend/cms/requirement');
		$this->load->view("frontend/comman/footer"); 
	}
	
	function social_media_marketing(){
	    
	    $this->load->view("frontend/comman/header");
	    $data['records']=$this->Common_model->CommonRetrivedata('faqs','*',array('status'=>1),1);
		$this->load->view('frontend/cms/social_media_marketing',$data);
		$this->load->view("frontend/comman/footer");
	}
	
	function seo(){
	    
	    $this->load->view("frontend/comman/header");
	    $data['records']=$this->Common_model->CommonRetrivedata('faqs','*',array('status'=>1),1);
		$this->load->view('frontend/cms/seo',$data);
		$this->load->view("frontend/comman/footer");
	}
	function influancer_marketing(){
	    
	    $this->load->view("frontend/comman/header");
		$this->load->view('frontend/cms/influancer_marketing');
		$this->load->view("frontend/comman/footer");
	}
	
	function lead_generation(){
	    $this->load->view("frontend/comman/header");
		$this->load->view('frontend/cms/lead_generation');
		$this->load->view("frontend/comman/footer");
	}
	function content_marketing(){
	    $this->load->view("frontend/comman/header");
	    $data['records']=$this->Common_model->CommonRetrivedata('faqs','*',array('status'=>1),1);
		$this->load->view('frontend/cms/content_marketing',$data);
		$this->load->view("frontend/comman/footer");
	}
	
	function website_design(){
	    $this->load->view("frontend/comman/header");
		$this->load->view('frontend/cms/website_design');
		$this->load->view("frontend/comman/footer");
	}
	
	function shedule_call(){
	    $this->load->view("frontend/comman/header");
		$this->load->view('frontend/cms/shedule_call');
		$this->load->view("frontend/comman/footer");
	}
	
	function web_development(){
	    $this->load->view("frontend/comman/header");
		$this->load->view('frontend/cms/web_development');
		$this->load->view("frontend/comman/footer");
	}
	
	function hire_web_developer(){
	    
	    $this->load->view("frontend/comman/header");
		
		$this->load->view("frontend/comman/footer");
	}
	function mobileapp_development(){
	    
	    $this->load->view("frontend/comman/header");
		$this->load->view('frontend/cms/mobileapp_development');
		$this->load->view("frontend/comman/footer");
	}
	function visual_branding(){
	    
	    $this->load->view("frontend/comman/header");
		$this->load->view('frontend/cms/visual_branding');
		$this->load->view("frontend/comman/footer");
	}
	
	function connect_now(){
	   $this->load->view("frontend/comman/header");
		
		$this->load->view("frontend/comman/footer");
	}
	function ecommerce_development(){
	   $this->load->view("frontend/comman/header");
		$this->load->view('frontend/cms/ecommerce_development');
		$this->load->view("frontend/comman/footer");
	}
	
	function about(){
	    $this->load->view("frontend/comman/header");
		$this->load->view('frontend/cms/about');
		$this->load->view("frontend/comman/footer");
	}
	function portfolio(){
	    $this->load->view("frontend/comman/header");
		$this->load->view('frontend/cms/portfolio');
		$this->load->view("frontend/comman/footer");
	}
	
	function blog(){
	    $this->load->view("frontend/comman/header");
	    $data['result']=$this->Common_model->CommonRetrivedata('blogs','*',array('blog_status'=>1),1);	
		$this->load->view('frontend/cms/blog',$data);
		$this->load->view("frontend/comman/footer");
	}
	
	function blog_details(){
	    
	    $this->load->view("frontend/comman/header");
	    $data['result']=$this->Common_model->CommonRetrivedata('blogs','*',array('blog_status'=>1,"slug"=>$this->uri->segment(2)),1);	
	    $data['services']=$this->Common_model->CommonRetrivedata('services','*',array('status'=>1),1);	
		$this->load->view('frontend/cms/blog_details',$data);
		$this->load->view("frontend/comman/footer");
	}
	
	function blog_category(){
	    $this->load->view("frontend/comman/header");
	    $data['result']=$this->Common_model->CommonRetrivedata('blogs','*',array('blog_status'=>1,"service"=>$this->uri->segment(2)),1);	
		$this->load->view('frontend/cms/blog',$data);
		$this->load->view("frontend/comman/footer");
	}
	
	function career(){
	    
	    $this->load->view("frontend/comman/header");
	    if(!empty($_POST)){
	        
	         
	            if ($_FILES['image']['name'] != '') {                          
                    $file_name='image';$folder_name='career';
                    $image=$this->Common_model->CommonFileUpload($file_name,$folder_name); 
                 }else{
                    $image='';
                 } 
	          $insert = array(
	            'firstname'=>$this->input->post("firstname"),
	            'lastname'=>$this->input->post("lastname"),
	            'phone'=>$this->input->post("phone"),
	            'email'=>$this->input->post("email"),
	            'service'=>$this->input->post("service"),
	            'message'=>$this->input->post("message"),
	            'file_name'=>$image,
	            );
	            
	           
	            
	         $result=$this->Common_model->commonInsert('carrier',$insert);
	         
	         if(!empty($result)){
	         
                    // admin mail
                    
                    // $to = 'info@sanpurple.com';
                    // $subject = "New carrier received from Sanpurple";
                    // $message =  'Dear Admin,<br/><br/>
        
                    //                     A user has recently carrier through submitting the form. Please check the details below,<br/><br/>
                                        
                    //                     Name: '.$this->input->post("firstname").' '.$this->input->post("lastname").'<br/>
                    //                     Email: '.$this->input->post("email").'<br/>
                    //                     Phone.: '.$this->input->post("[phone]").'<br/>
                    //                     Service: '.$this->input->post("service").'<br/><br/>
                                        
                    //                     Kindly oblige the user by addressing their queires at your earliest.<br/><br/>
                                        
                    //                     Thanks and Regards,<br/>
                    //                     Team Livingwhole';
                    // $headers = "From: info@sanpurple.com\r\n";
                    // $headers .= "Reply-To: info@sanpurple.com\r\n";
                    // $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
                    // $mailSent = mail($to, $subject, $message, $headers);
                    
                    // *********************************************************************
	            
	          
	              $this->session->set_flashdata('success', 'Form Submitted Successfully...');
	         }else{
	             $this->session->set_flashdata('error', 'Something went wrong...');
	         }
	    
	    }
		$this->load->view('frontend/cms/career');
		$this->load->view("frontend/comman/footer");
	}
	function contact(){
	    $this->load->view("frontend/comman/header");
	    
	    if(!empty($_POST)){
	        
	              
	            
	          $insert = array(
	            'firstname'=>$this->input->post("firstname"),
	            'lastname'=>$this->input->post("lastname"),
	            'phone'=>$this->input->post("phone"),
	            'email'=>$this->input->post("email"),
	            'service'=>$this->input->post("service"),
	            'message'=>$this->input->post("message"),
	            );
	            
	         $result=$this->Common_model->commonInsert('contact_us',$insert);
	         
	         if(!empty($result)){
	             $to = $this->input->post("email");
                  $subject = "Contact us form submitted successfully";
                  $message = 'Dear '.$this->input->post("firstname"). ',<br/><br/>
        
                                            We have received your form regarding your queries and details. The queries mentioned in the form shall be addressed at the earliest.
                                            
                                            Thank You for your cooperation and patience.<br/><br/>
                                            
                                            Thanks and Regards,<br/>
                                            Team Sanpurple';
                    $headers = "From: info@sanpurple.com\r\n";
                    $headers .= "Reply-To: info@sanpurple.com\r\n";
                    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
                    $mailSent = mail($to, $subject, $message, $headers);
                    
                    // **********************************************************
                    
                    // admin mail
                    
                    
                    $to = 'info@sanpurple.com';
                    $subject = "New enquiry received from Sanpurple";
                    $message =  'Dear Admin,<br/><br/>
        
                                        A user has recently contacted through submitting the form. Please check the details below,<br/><br/>
                                        
                                        Name: '.$this->input->post("firstname").' '.$this->input->post("lastname").'<br/>
                                        Email: '.$this->input->post("email").'<br/>
                                        Phone.: '.$this->input->post("[phone]").'<br/>
                                        Service: '.$this->input->post("service").'<br/><br/>
                                        
                                        Kindly oblige the user by addressing their queires at your earliest.<br/><br/>
                                        
                                        Thanks and Regards,<br/>
                                        Team Livingwhole';
                    $headers = "From: info@sanpurple.com\r\n";
                    $headers .= "Reply-To: info@sanpurple.com\r\n";
                    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
                    $mailSent = mail($to, $subject, $message, $headers);
                    
                    // *********************************************************************
	            
	          
	              $this->session->set_flashdata('success', 'Form Submitted Successfully...');
	         }else{
	             $this->session->set_flashdata('error', 'Something went wrong...');
	         }
	    
	    }
		$this->load->view('frontend/cms/contact');
		$this->load->view("frontend/comman/footer");
	}
	
	

  
   
}
