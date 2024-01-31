<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Common_model extends CI_Model {
	public function __construct() {
		parent::__construct();
	}
	public function commonInsert($tableName,$arrayData){
		$this->db->insert($tableName,$arrayData);
		$insert_id = $this->db->insert_id();
		return  $insert_id;
	}
	public function commonUpdate($tableName,$updateArray,$whereCondition){
		$up=$this->db->update($tableName,$updateArray,$whereCondition);
		return $up;
	}
	
	public function Get_sub_categories(){
        $this->db->select("t1.*,t2.category_name");
        $this->db->from('sub_categories as t1');
        $this->db->join('categories as t2','t1.category_id = t2.id','left');
        $this->db->group_by('t1.id','DESC');
        $this->db->order_by('t1.display_order','DESC');
        $query = $this->db->get();                   
        $result=$query->result_array();
        return  $result;
    }
	public function commonDelete($tableName,$whereCondition,$image_name='',$image_path=''){
		if((!empty($image_name)) &&(!empty($image_path))){
			$this->db->select($image_name);
			$this->db->from($tableName);
			$this->db->where($whereCondition);
			$query = $this->db->get();
			$image = $query->row_array();
			$file =  './assets/images/'.$image_path.'/'.$image[$image_name];
			if(is_file($file))
				unlink($file); 
		}
		$this->db->where($whereCondition);
		$result= $this->db->delete($tableName);
		return $result;		
	}
	
	function get_state($args = array()){
        
        $this->db->select("*");
        $this->db->from('states');
        
        if(!empty($args['country_id'])){
           $this->db->where('country_id', $args['country_id']);
        }
        if(!empty($args['state_name'])){
           $this->db->where('state_name', $args['state_name']);
        }
        $this->db->order_by('id','ASC');
        $query = $this->db->get();     
       
        $result=$query->result_array();
        
        return  $result;
    }
    
    function get_cities($args = array()){
        
        $this->db->select("*");
        $this->db->from('cities');
        
        if(!empty($args['state_id'])){
           $this->db->where('state_id', $args['state_id']);
        }
        $this->db->order_by('id','ASC');
        $query = $this->db->get();     
       
        $result=$query->result_array();
        
        return  $result;
    }
	 public function get_country($args=array()){
         
      
        $this->db->select("*");
        $this->db->from('countries');
         if(!empty($args['country_name'])!=""){
           $this->db->where('country_name', $args['country_name']);
        }
        $this->db->order_by('id','ASC');
        $query = $this->db->get();                   
        $result=$query->result_array();
        return  $result;
    }
	function Get_testimonials(){
        $this->db->select("*");
        $this->db->from('testimonials');
        $this->db->order_by('id','ASC');
        $query = $this->db->get();                   
        $result=$query->result_array();
        return  $result;
    }
	public function commonMultiDelete($tableName,$delete_ids,$image_name='',$image_path=''){
		if((!empty($image_name)) &&(!empty($image_path))){
			$this->db->select($image_name);
			$this->db->from($tableName);
			$this->db->where_in('id',$delete_ids);
			$query = $this->db->get();
			$images = $query->result_array();
			foreach($images as $img){
				$file =  './assets/images/'.$image_path.'/'.$img[$image_name];
				if(is_file($file))
					unlink($file); 
			}
		}
		$this->db->where_in('id',$delete_ids);
		$result= $this->db->delete($tableName);
		return $result;		
	}
	public function CommonRetrivedata($tablename,$fields,$where,$type,$order=''){
		$res=$this->db->select($fields)->from($tablename);
		if($where!='' OR $where!=NULL){$this->db->where($where);}
		if(!empty($order)){
			(is_array($order)) ? $this->db->order_by($order[0],$order[1]) : $this->db->order_by('id',$order);
		}
		
		
	
		if($type ==1){
			return $this->db->get()->result_array();
		}else if($type ==2){
			return $this->db->get()->row_array();
		}else{
			return $this->db->get()->num_rows();
		}
	}
	public function CommonRetriveObject($tablename,$fields,$where,$type,$order=''){
		$res=$this->db->select($fields)->from($tablename);
		if($where!='' OR $where!=NULL){$this->db->where($where);}
		if(!empty($order)){
			if(is_array($order)){
				$this->db->order_by($order[0],$order[1]);
			}
			else{
				$this->db->order_by('id',$order);
			}
		}
		if($type ==1){
			return $this->db->get()->result();
		}else if($type ==2){
			return $this->db->get()->row();
		}else{
			return $this->db->get()->num_rows();
		}
	}
	public function CSV_download($page_name,$query){
		$this->load->helper('csv');
		query_to_csv($query, TRUE, $page_name.'('.date("m-d-Y").')'.'.csv');
	}
	
	public function CommonImageUpload($image_name,$folder_name,$height='',$width=''){
	   
		$Img='';
		$config['upload_path'] = './assets/images/'.$folder_name.'/'; /* NB! create this dir! */
		$config['allowed_types'] = 'gif|jpg|png|bmp|jpeg';
		$config['max_size']  = '0';
		$config['max_width']  = '0';
		$config['max_height']  = '0';
		$this->load->library('upload', $config);
		
		 
		if(! $this->upload->do_upload($image_name)){
			$data['msg'] = $this->upload->display_errors();
		
		}else{
			$data = $this->upload->data();
			$uploadedImages[$image_name] = $data['file_name'];
			$Img = $uploadedImages[$image_name];
			$config_image = array();
			$config_image = array(
				'image_library' => 'gd2',
				'source_image' => './assets/images/'.$folder_name.'/'.$Img,
				'new_image' => './assets/images/'.$folder_name.'/'.$Img,
				'maintain_ratio' => FALSE,
				'rotate_by_exif' => TRUE,
				'strip_exif' => TRUE,
			);	
			if(!empty($height)){
				$config_image['height']=$height;
			}	
			if(!empty($width)){
				$config_image['width']=$width;
			}				
			$this->load->library('image_lib', $config_image);
			$this->image_lib->initialize($config_image);
			$this->image_lib->resize();
			$this->image_lib->clear();						
		}
		return   $Img;
	}
	public function remove_old_image($image_name,$folder_name){	
		$file =  './assets/images/'.$folder_name.'/'.$image_name;
		if(is_file($file))
			unlink($file);
		return   1;
	}
	public function CommonMultipleImageUpload($files,$folder_name)
	{
		$this->load->library('upload');
		$dataInfo = array();
		$files = $files;
		$cpt = count($files['userfile']['name']);
		for($i=0; $i<$cpt; $i++)
		{           
			$files['userfile']['name']= $files['userfile']['name'][$i];
			$files['userfile']['type']= $files['userfile']['type'][$i];
			$files['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
			$files['userfile']['error']= $files['userfile']['error'][$i];
			$files['userfile']['size']= $files['userfile']['size'][$i];
			$this->upload->initialize($this->set_upload_options($folder_name));
			$this->upload->do_upload();
			$dataInfo[] = $this->upload->data();
		}
		return $dataInfo;
	}
	private function set_upload_options($folder_name)
	{   
		$config = array();
		$config['upload_path'] = './assets/images/'.$folder_name.'/';
		$config['allowed_types'] = 'gif|jpg|png|bmp|jpeg';
		$config['max_size']      = '0';
		$config['overwrite']     = FALSE;
		return $config;
	}
		public function get_all_enquiries(){
        $this->db->select("*");
        $this->db->from('contact_us');
        $this->db->order_by('id','DESC');
        $query = $this->db->get();                   
        $result=$query->result_array();
        return  $result;
    }
    public function get_all_carrier_enq(){
        $this->db->select("*");
        $this->db->from('carrier');
        $this->db->order_by('id','DESC');
        $query = $this->db->get();                   
        $result=$query->result_array();
        return  $result;
    }
	public function CommonFileUpload($file_name,$folder_name){
		$config['upload_path'] = './assets/images/'.$folder_name.'/';
		$config['allowed_types'] = 'docx|doc|word|pdf|jpg|png|bmp|jpeg';
		$config['max_size']  = '0';
		$config['max_width']  = '0';
		$config['max_height']  = '0';
		$this->load->library('upload', $config);
		$this->upload->initialize($config); 
		if(!$this->upload->do_upload($file_name))
		{
			$data['msg'] = $this->upload->display_errors();
		}
		else
		{
			$data = $this->upload->data();
			$uploadedFile[$file_name] = $data['file_name'];
			$ImgFile = $uploadedFile[$file_name];
			$Imgpdf = array(
				$file_name => $uploadedFile[$file_name]
			);
		}
		if($ImgFile != '')
		{
			$pdf_final= $ImgFile;
		}else{
			$pdf_final= '';
		}
		return   $pdf_final;
	}
	public function password_check($id,$encode_password)
	{        $this->db->select('*');
	$this->db->from('admins');
	$this->db->where('password',$encode_password);
	$this->db->where('id',$id);		
	$query=$this->db->get();       
	$result= $query->row_array();	
	return $result;
}

public function check_order($row_id){
 
    $this->db->select('*');
    $this->db->from('order_details');
    $this->db->where('order_id',$row_id);
    $query=$this->db->get();       
    $result= $query->result();	
   
    return $result;
}
public function check_username($id,$cur_username)
{   $this->db->select('*');
$this->db->from('admins');
$this->db->where('user_name',$cur_username);
$this->db->or_where('email',$cur_username);
$this->db->where('id',$id);		
$query=$this->db->get();       
$result= $query->row_array();	
return $result;
}
public function check_mobile($id,$mobile)
{   $this->db->select('*');
$this->db->from('admins');
$this->db->where('mobile',$mobile);
$this->db->where('id',$id);		
$query=$this->db->get();       
$result= $query->row_array();	
return $result;
}	
public function search_table_Data($fileld,$search='',$table_name){
	$this->db->select($fileld,FALSE);
	if($search!='' && $search!=0){
		$this->db->where("`id` like '%$search%'");	
	}
	$result = $this->db->get($table_name)->num_rows();
	return $result;
}
public function search_table_Data_Limit($start=0,$limit=0,$search='',$column=0,$order='desc',$table_name){
	$this->db->select('*',FALSE);
	if($search!=''){
		$this->db->where("`id` like '%$search%'");	
	}
	switch($column){
		case 0: {
			$this->db->order_by("`id`", $order);
			break;
		}
	}
	if($limit!=0){
		$this->db->limit($limit,$start);	
	}
	$result = $this->db->get($table_name)->result_array();		
	return $result;
}
function get_product_brand(){
        $this->db->select("*");
        $this->db->from('product_brand');
        $this->db->order_by('id','DESC');
        $query = $this->db->get();                   
        $result=$query->result_array();
        return  $result;
}
 public function Get_categories(){
        $this->db->select("*");
        $this->db->from('categories');
        $this->db->order_by('id','DESC');
        $query = $this->db->get();                   
        $result=$query->result_array();
        return  $result;
    }
}