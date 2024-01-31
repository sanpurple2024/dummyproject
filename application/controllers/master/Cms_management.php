<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cms_management extends CI_Controller {
    
     function __construct(){
           parent::__construct();
          $this->load->model(array('Common_model'));
          $this->load->helper(array('common_helper'));
      
  }
//*******************************************************************************   
  function cms_pages_listing(){
      
        $this->load->view("master/comman/header");
        $this->load->view("master/comman/left_sidebar");
        $data['record']=$this->Common_model->CommonRetrivedata('cms_pages','*','',1);
        
        $data['records']=$this->Common_model->CommonRetrivedata('faqs','*','',1);
			
		if(!empty($_POST)){
		    $delete_ids=$_POST['delete_ids'];
			$delete=$this->Common_model->commonMultiDelete('faqs',$delete_ids);	
			if(!empty($delete)){
			    
			     $insert_history = array("comment"=>"CMS Pages Deleted","ip_address"=>$_SERVER['REMOTE_ADDR']);
				$this->session->set_flashdata('success', 'Deleted Successfully...');
			}else{
				$this->session->set_flashdata('error', 'Not Deleted...');
			}
			
		}
        
		$this->load->view('master/cms_management/cms_pages_listing',$data);
		$this->load->view("master/comman/footer");
  }
  
  function change_cms_delete($id){
       $result=$this->Common_model->commonDelete('cms_pages',array('id'=>$id));	
		(!empty($result)) ? $this->session->set_flashdata( 'success', 'Deleted Successfully...' ) : $this->session->set_flashdata( 'error', 'Not Deleted...' );
		 redirect('master/cms_pages');
  }
//*******************************************************************************   
  function faqs_listing(){
      
        $this->load->view("master/comman/header");
        $this->load->view("master/comman/left_sidebar");
        $data['records']=$this->Common_model->CommonRetrivedata('faqs','*','',1);
        if(!empty($_POST)){
		     $delete_ids=$this->input->post("delete_ids");
			$delete=$this->Common_model->commonMultiDelete('faqs',$delete_ids);	
			if(!empty($delete)){
			    
			    $insert_history = array("comment"=>"FAQ's Deleted","ip_address"=>$_SERVER['REMOTE_ADDR']);
                //insert_history_project($insert_history);
			
				$this->session->set_flashdata('success', 'Deleted Successfully...');
			}else{
				$this->session->set_flashdata('error', 'Not Deleted...');
			}
		
		}
        
		$this->load->view('master/cms_management/faqs_listing',$data);
		$this->load->view("master/comman/footer");
  }
  
 //******************************************************************************* 
 
  function contact_us_submit(){
      
    //   $data['record']  = $this->Common_model->CommonRetrivedata('contact_us_details','*',array('id'=>1),2);	
       	
        if(!empty($_POST)){
			$update = array(
    			'address'=>$this->input->post("addres"),
    			'contact_us_description'=>$this->input->post("contact_us_description"),
    			'mobile_no'=>$this->input->post("mobile"),
    			'alt_mobile_no'=>$this->input->post("alt_mobile"),
    			'email_id'=>$this->input->post("email_id"),
    			'alt_email_id'=>$this->input->post("alt_email_id"),
    			'facebook_link'=>$this->input->post("facebook"),
    			'instagram_link'=>$this->input->post("instagram"),
    			'twitter_link'=>$this->input->post("twitter_link"),
    			'linked_in_link'=>$this->input->post("linked_in"),
    // 			'youtube_link'=>$_POST['youtube'],			
    			'map_code'=>stripslashes($this->input->post("map_code")),	
    // 			'map_code2'=>$_POST['map_code2'],			
    // 			'blog_link'=>$this->input->post("blog_link"),
    			'whatsapp_number'=>($this->input->post("whatsapp_number")!="")? $this->input->post("whatsapp_number") : "",
			);
			
			
			$this->db->where('id',"1");
			$result=$this->Common_model->commonUpdate('contact_us_details',$update,array('id'=>"1"));
			
	
		
			if(!empty($result)){
			     $insert_history = array("comment"=>"Contact Us Details Updated","ip_address"=>$_SERVER['REMOTE_ADDR']);
                //insert_history_project($insert_history);
			
				$this->session->set_flashdata('success', 'Updated Successfully...');
		    }else{
				$this->session->set_flashdata('error', 'Not Updated...');
			}
           echo "1";
		}
  }
  
//******************************************************************************* 

  function contact_us_details(){
      
        $this->load->view("master/comman/header");
        $this->load->view("master/comman/left_sidebar");
        $id = "1";
        $data['record']  = $this->Common_model->CommonRetrivedata('contact_us_details','*',array('id'=>$id),2);	
        if(!empty($_POST)){
			$update=array(
			'address'=>$_POST['addres'],
			'contact_us_description'=>$_POST['contact_us_description'],
			'mobile_no'=>$_POST['mobile'],	
			'alt_mobile_no'=>$_POST['alt_mobile'],
			'email_id'=>$_POST['email_id'],
			'alt_email_id'=>$_POST['alt_email_id'],
			'facebook_link'=>$_POST['facebook'],
			'instagram_link'=>$_POST['instagram'],
			'twitter_link'=>$_POST['twitter_link'],
			'linked_in_link'=>$_POST['linked_in'],			
			'map_code'=>$_POST['map_code'],				
			'blog_link'=>$_POST['blog_link'],
			'whatsapp_number'=>(isset($_POST['whatsapp_number']))? $_POST['whatsapp_number'] : "",
			);
			$this->db->where('id',"1");
			$result=$this->Common_model->commonUpdate('contact_us_details',$update,array('id'=>"1"));
		
			if(!empty($result)){
			     $insert_history = array("comment"=>"Contact Us details Updated","ip_address"=>$_SERVER['REMOTE_ADDR']);
                //insert_history_project($insert_history);
				$this->session->set_flashdata('success', 'Updated Successfully...');
				echo "1";
		    }else{
				$this->session->set_flashdata('error', 'Not Updated...');
				echo "2";
			}
           
		}
        
		$this->load->view('master/cms_management/contact_us_details',$data);
		$this->load->view("master/comman/footer");
  }
  
//*******************************************************************************  
  function add_cms_page(){
      
        $this->load->view("master/comman/header");
        $this->load->view("master/comman/left_sidebar");
        
        if(!empty($_POST)){
            
               if (isset($_FILES['image']['name']) && $_FILES['image']['name'] != '') {
		            $image_name='image';$folder_name='about';
		            $height=$width="";
		            $image=$this->Common_model->CommonImageUpload($image_name,$folder_name,$height,$width);  
		        }else{
		            $image="";
		       }
			$insert=array(	      	
			        'page_name'=>$this->input->post("page_name"),	
                	'content'=>$this->input->post("content"),			     		
                	'image'=>$image,	
			);
			
			
// 			$this->db->where('id',$id);
// 			$result=$this->Common_model->commonUpdate('cms_pages',$update,array('id'=>$id));
	        $result=$this->Common_model->commonInsert('cms_pages',$insert);	
		
			if(!empty($result)){
			
				// if (isset($_FILES['image']['name']) && $_FILES['image']['name'] != '') {
	   //            $this->Common_model->remove_old_image($old_image,$folder_name);
	   //         }
	   
	            $insert_history = array("comment"=>"CMS Pages Added","ip_address"=>$_SERVER['REMOTE_ADDR']);
                //insert_history_project($insert_history);
				   $this->session->set_flashdata('success', 'Added Successfully...');
				   echo "1";
		    }else{
					$this->session->set_flashdata('error', 'Not Added...');
			}
        }
		$this->load->view('master/cms_management/cms_pages_add');
		$this->load->view("master/comman/footer");
  }
  
//*******************************************************************************


   public function cms_pages_edit($id){
    
		$this->load->view("master/comman/header");
        $this->load->view("master/comman/left_sidebar");
       
		$data['record']=$this->Common_model->CommonRetrivedata('cms_pages','*',array('id'=>$id),2);
		$old_image = $data['record']['image'];
		$data['id'] = $id;
   
      
		if(!empty($_POST)){
		
			if (isset($_FILES['image']['name']) && $_FILES['image']['name'] != '') {
		           $image_name='image';$folder_name='about';$height='';$width='';
		          $image_name='image';$folder_name='about';
		            $image=$this->Common_model->CommonImageUpload($image_name,$folder_name,$height,$width);  
		       }else{
		            $image=$old_image;
		       }
    			$update=array(	      								
                	 'page_name'=>$this->input->post("page_name"),	
                	 'content'=>$this->input->post("content"),
                	 'image'=>$image,	
    			);
    			
    	 
			$this->db->where('id',$id);
			$result=$this->Common_model->commonUpdate('cms_pages',$update,array('id'=>$id));
			
		
			if($result){
			    
			    $insert_history = array("comment"=>"CMS Pages Updated","ip_address"=>$_SERVER['REMOTE_ADDR']);
                //insert_history_project($insert_history);
			
				if (isset($_FILES['image']['name']) && $_FILES['image']['name'] != '') {
	              $this->Common_model->remove_old_image($old_image,$folder_name);
	            }
				 $this->session->set_flashdata('success', 'updated Successfully...');
		    }else{
				$this->session->set_flashdata('error', 'Not updated...');
			}
		
		}
		
		$this->load->view('master/cms_management/cms_pages_edit',$data);
		$this->load->view("master/comman/footer");
	}
	
//******************************************************************************


    public function faqs_delete($id){
	
	
   	     $insert_history = array("comment"=>"FAQ Deleted","ip_address"=>$_SERVER['REMOTE_ADDR']);
         //insert_history_project($insert_history);
	     $result=$this->Common_model->commonDelete('faqs',array('id'=>$id));	
		(!empty($result)) ? $this->session->set_flashdata( 'success', 'Deleted Successfully...' ) : $this->session->set_flashdata( 'error', 'Not Deleted...' );
		 redirect('master/faqs');
	}
//******************************************************************************
   function add_faq(){
       
        $this->load->view("master/comman/header");
        $this->load->view("master/comman/left_sidebar");
        if(!empty($_POST)){
		
			$insert=array(
            			'question'=>$this->input->post("question"), 
            			'answer'=>$this->input->post("answer"), 
            			'status'=>1, 
            		);
		
		    $result=$this->Common_model->commonInsert('faqs',$insert);	
		    
		    if(!empty($result)){
		        $insert_history = array("comment"=>"FAQ Added","ip_address"=>$_SERVER['REMOTE_ADDR']);
                //insert_history_project($insert_history);
				$this->session->set_flashdata('success', 'Added Successfully...');
		    }else{
				$this->session->set_flashdata('error', 'Not Added...');
			}
			  echo "1";
		}
        $this->load->view('master/cms_management/add_faq');
		$this->load->view("master/comman/footer");
   }
   
//******************************************************************************

        function edit_faq($id){
            
            $this->load->view("master/comman/header");
            $this->load->view("master/comman/left_sidebar");
            $data['record']  =$this->Common_model->CommonRetrivedata('faqs','`id`, `question`, `answer`,',array('id'=>$id),2);	
             if(!empty($_POST)){
		
        		 $update=array(
        		    	'question'=>$this->input->post("question"), 
            			'answer'=>$this->input->post("answer"), 
            			'status'=>1, 
        		);
    			$this->db->where('id',$id);
    			$result=$this->Common_model->commonUpdate('faqs',$update,array('id'=>$id));
    			echo $this->db->last_query();die;
		     if(!empty($result)){
		         $insert_history = array("comment"=>"FAQ Updated","ip_address"=>$_SERVER['REMOTE_ADDR']);
                // //insert_history_project($insert_history);
				$this->session->set_flashdata('success', 'updated Successfully...');
		    }else{
					$this->session->set_flashdata('error', 'Not updated...');
			}
		
		}
		
		    $data['id'] = $id;
            
            $this->load->view('master/cms_management/edit_faq',$data);
		    $this->load->view("master/comman/footer");
        }
  
  
//*************************************************************************

        function ad_banners(){
             
            $this->load->view("master/comman/header");
            $this->load->view("master/comman/left_sidebar");
            $data['records']= $this->Common_model->CommonRetrivedata('banners','*','',1);
            $this->load->view('master/cms_management/banner_listing',$data);
		    $this->load->view("master/comman/footer");
             
         }
         
    public function banners_delete($id) {
   
        if(!empty($id)){
            $insert_history = array("comment"=>"Banners Deleted","ip_address"=>$_SERVER['REMOTE_ADDR']);
                //insert_history_project($insert_history);
                
          $image_name='image';$folder_name='banners'; 
         $delete=$this->Common_model->commonDelete('banners',array('id'=>$id),$image_name,$folder_name); 
         (!empty($delete)) ? $this->session->set_flashdata('success', 'Deleted Successfully...') : $this->session->set_flashdata('error', 'Not Deleted...');
           redirect('master/cms_management/ad_banners');
        }else{
           redirect('master/cms_management/ad_banners');
        }
   }
         
         
//*************************************************************************

        function ad_blog(){
             
            $this->load->view("master/comman/header");
            $this->load->view("master/comman/left_sidebar");
            $data['records']=$this->Common_model->CommonRetrivedata('blogs','*','',1,array('id','desc'));
            $this->load->view('master/cms_management/blog_listing',$data);
		    $this->load->view("master/comman/footer");
             
         }
         
// *****************************************************************

        function add_blog(){
            
            $this->load->view("master/comman/header");
            $this->load->view("master/comman/left_sidebar");
            $data['records']=$this->Common_model->CommonRetrivedata('blogs','*','',1,array('id','desc'));
            
         if(!empty($_POST)){
      
             if ($_FILES['image']['name'] != '') {                          
                $image_name='image';$folder_name='blog';$height='420';$width='500';
                $image=$this->Common_model->CommonImageUpload($image_name,$folder_name,$height,$width); 
             }else{
                $image='';
             }
             $insert=array(
                'image'=>$image,
                'image_alt'=>$this->input->post("image_alt"),
                'title'=>$this->input->post("title"),
                'button_name'=>$this->input->post("button_name"),
                'button_link'=>$this->input->post("button_link"),
                'blog_url'=>get_url($this->input->post("title")),
                'blog_date_time '=>date('Y-m-d H:i:s'),
                'description'=>$this->input->post("description"),
                'title_tag'=>$this->input->post("title_tag"),
                'description_tag'=>$this->input->post("description_tag"),
                'keyword_tag'=>$this->input->post("keyword_tag"),
                'blog_status'=>1,
                'slug'=>$this->input->post("slug"),
                'service'=>$this->input->post("service"),
                
             );
                 $result=$this->Common_model->CommonInsert('blogs',$insert);
                 if(!empty($result)){
                     $insert_history = array("comment"=>"Blogs Added","ip_address"=>$_SERVER['REMOTE_ADDR']);
                // //insert_history_project($insert_history);
                    $this->session->set_flashdata('success', 'Added Successfully...');
                 }else{
                    $this->session->set_flashdata('error', 'Not Added...');
                 }
            
            }	
            $this->load->view('master/cms_management/add_blog');
		    $this->load->view("master/comman/footer");
        }
        
        
   public function blog_status($id,$status){
       
       $insert_history = array("comment"=>"Blogs Status Changed","ip_address"=>$_SERVER['REMOTE_ADDR']);
    //   //insert_history_project($insert_history);
      $updated_status=$status==1?'0':'1';
         $result=$this->Common_model->commonUpdate('blogs',array('blog_status'=>$updated_status),array('id'=>$id));  
       (!empty($result))?$this->session->set_flashdata( 'success', 'Status Changed Successfully.' ) :$this->session->set_flashdata( 'error', 'Status Not Changed.' );
        redirect('master/ad_blog');
   }

    public function blog_delete($id) {
   
      if(!empty($id)){
          $insert_history = array("comment"=>"Blogs Deleted","ip_address"=>$_SERVER['REMOTE_ADDR']);
       
          $image_name='image';$folder_name='blog'; 
         $delete=$this->Common_model->commonDelete('blogs',array('id'=>$id),$image_name,$folder_name); 
        (!empty($delete)) ? $this->session->set_flashdata('success', 'Deleted Successfully...') : $this->session->set_flashdata('error', 'Not Deleted...');
           redirect('master/ad_blog');
      }else{
           redirect('master/ad_blog/');
      }
   }

        
//******************************************************************************

        function edit_blog($id){
            
            $this->load->view("master/comman/header");
            $this->load->view("master/comman/left_sidebar");
            //  $data['category_name']=$this->Common_model->CommonRetrivedata('blog_categories','*','',1,array('id','desc'));
            $data['record']  =$this->Common_model->CommonRetrivedata('blogs','*',array('id'=>$id),2);
             $old_image=$data['record']['image'];
         
         if(!empty($_POST)){
                if ($_FILES['image']['name'] != '') {
                    $image_name = 'image';$folder_name='blog';$height='420';$width='500';
                    $image = $this->Common_model->CommonImageUpload($image_name,$folder_name,$height,$width);  
                }else{
                    $image = $old_image;
                }
               $update=array(
                    'image'=>$image,
                    'image_alt'=>$this->input->post("image_alt"),
                    'title'=>$this->input->post("title"),
                    'button_name'=>$this->input->post("button_name"),
                    'button_link'=>$this->input->post("button_link"),
                    'blog_url'=>get_url($this->input->post("title")),
                    'blog_date_time '=>date('Y-m-d H:i:s'),
                    'description'=>$this->input->post("description"),
                    'title_tag'=>$this->input->post("title_tag"),
                    'description_tag'=>$this->input->post("description_tag"),
                    'keyword_tag'=>$this->input->post("keyword_tag"),
                    'slug'=>$this->input->post("slug"),
                    'service'=>$this->input->post("service"),
                    'blog_status'=>1		
              );
         $result=$this->Common_model->commonUpdate('blogs',$update,array('id'=>$id));
         if(!empty($result)){
            if ($_FILES['image']['name'] != '') {  
               $this->my_model->remove_old_image($old_image,$folder_name);
            }
            $insert_history = array("comment"=>"Blogs Updated","ip_address"=>$_SERVER['REMOTE_ADDR']);
    //   //insert_history_project($insert_history);
               $this->session->set_flashdata('success', 'updated Successfully...');
          }else{
            $this->session->set_flashdata('error', 'Not updated...');
         }
        
        
        
      }
            $this->load->view('master/cms_management/edit_blog',$data);
		   $this->load->view("master/comman/footer");
      
      
        }
         
//***********************************************************************************   

         function add_banner(){
             
            $this->load->view("master/comman/header");
            $this->load->view("master/comman/left_sidebar");
            
            $data['records']= $this->Common_model->CommonRetrivedata('banners','*',array('status'=>1),1);
		   $sizes = explode("*",$this->input->post("banner_size"));
			 
		 if(!empty($_POST)){
		
    		  if ($_FILES['image']['name'] != '') {                          
                $image_name='image';$folder_name='banners';
                $image=$this->Common_model->CommonImageUpload($image_name,$folder_name,$height=$sizes[1],$width=$sizes[0]); 
               
             }else{
                $image='';
             }
        
			$insert=array(
				'image'=>$image,
				'alt_tag'=>$this->input->post("alt_tag"),
				'position'=>$this->input->post("position"),
				 'description'=>$this->input->post("description"),
                'title'=>$this->input->post("title"),
				'banner_size'=>$this->input->post("banner_size"),
				 'uploaded_date_time '=>date('Y-m-d H:i:s'),
				'status'=>1
			);
			$result=$this->Common_model->CommonInsert('banners',$insert);
			if(!empty($result)){
			    $insert_history = array("comment"=>"Banners Added","ip_address"=>$_SERVER['REMOTE_ADDR']);
                //insert_history_project($insert_history);
				$this->session->set_flashdata('success', 'Insert Successfully...');
			}else{
				$this->session->set_flashdata('error', 'Not Insert...');
			}
			
		 }
            $this->load->view('master/cms_management/add_banner');
		    $this->load->view("master/comman/footer");
         
         
        }

//******************************************************************************


        function edit_banner($id){
            
            $this->load->view("master/comman/header");
            $this->load->view("master/comman/left_sidebar");
            $data['record']  =$this->Common_model->CommonRetrivedata('banners','*',array('id'=>$id),2);
            $old_image=$data['record']['image'];
          
            if(!empty($_POST)){
                 $sizes = explode("*",$this->input->post("banner_size"));
                if ($_FILES['image']['name'] != '') {
                    $image_name='image';$folder_name='banners';
                    $image=$this->Common_model->CommonImageUpload($image_name,$folder_name,$height=$sizes[1],$width=$sizes[0]);  
                }else{
                    $image= $old_image;
                }
              
             $update=array(
                      'image'=>$image,
                      'banner_size'=>$this->input->post("banner_size"),
                      'description'=>$this->input->post("description"),
                      'title'=>$this->input->post("title"),
        			  'alt_tag'=>$this->input->post("alt_tag"),
        			  'position'=>$this->input->post("position"),		
                   );
            
            $result=$this->Common_model->commonUpdate('banners',$update,array('id'=>$id));
         
            if(!empty($result)){
                $insert_history = array("comment"=>"Banners Updated","ip_address"=>$_SERVER['REMOTE_ADDR']);
                //insert_history_project($insert_history);
                
                if ($_FILES['image']['name'] != '') {  
                 $this->Common_model->remove_old_image($old_image,$folder_name);
                }
                $this->session->set_flashdata('success', 'updated Successfully...');
              }else{
                $this->session->set_flashdata('error', 'Not updated...');
             }
            
          }
      
      
           $this->load->view('master/cms_management/edit_banner',$data);
		   $this->load->view("master/comman/footer");
        }
        
        
    public function banners_status($id,$status){
        
        
    $insert_history = array("comment"=>"Banners Status Chnaged","ip_address"=>$_SERVER['REMOTE_ADDR']);
    //insert_history_project($insert_history);
                
      $updated_status=$status==1?'0':'1';
         $result=$this->Common_model->commonUpdate('banners',array('status'=>$updated_status),array('id'=>$id));  
       if(!empty($result)){
       $this->session->set_flashdata( 'success', 'Status Changed Successfully.' );
      }else{
      $this->session->set_flashdata( 'error', 'Status Not Changed.' );
       } 
           redirect('master/cms_management/ad_banners');
   }




//****************************************************************************
}