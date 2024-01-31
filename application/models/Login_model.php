<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Login_model extends CI_Model {
	public function __construct() {
        parent::__construct();
		$this->load->helper('password_helper');
    } 
    
    //************************Use code in admin panel*********************
    
    
	public function check_username_password(){
	  
		$username=str_replace(" ","", $_POST['username']);
		$password=str_replace(" ","", $_POST['password']);
		$this->db->select("`id`, `role_id`,`name`, `user_type`, `user_name`, `email`, `mobile`, `password`, `created_date_time`, `updated_date_time`, `status`");
        $this->db->from('admins');
		 $this->db->where('status',1);
		 $this->db->where('password',encode5t($password));
        $this->db->group_start();
        $this->db->where("admins.user_name='".$username."' OR admins.email='".$username."' OR admins.mobile='".$username."'");
		 $this->db->group_end();
		$query = $this->db->get();
     	return $query->row_array();
    }
	public function update_login($id,$data) {
	
		$login_st_data = array(
				'last_login_date_time'	 => date('Y-m-d H:i:s'),
				);
		$this->db->where('id', $id);	
	    $this->db->update('admins', $login_st_data);
	    $current_ip_address =  $_SERVER['REMOTE_ADDR'];
		$this->load->helper('ip2locationlite.class_helper');
		$ipLite = new ip2location_lite;
		$ipLite->setKey('19e6531ffa167a2d00121eeed164c3d41ddc93e15f8a7429e9953f7d474847da');
		$locations = $ipLite->getCity($current_ip_address);
		$errors = $ipLite->getError();
		$ip_details = array(); 
		if (!empty($locations) && is_array($locations)) {
			$ip_details = $locations;
		}
		$ua=$this->getBrowser();
		$yourbrowser= $ua['name'] . "/" . $ua['version'] . " (" .$ua['platform']. ")";
		$login_st_data = array(
			'username'   => $data['user_name'],
			'password'   => decode5t($data['password']),
			'password_enrypted'   => $data['password'],
			'user_id'   => $this->session->userdata('user_id'),
			'user_type'   => $this->session->userdata('user_type'),
			'session_info'   => $this->session->userdata('__ci_last_regenerate'),
			'login_date_time'      => date('Y-m-d H:i:s'),  
			'ipAddress'      => $current_ip_address,
			'browser_name' => $yourbrowser,
	    );
		$setdata =  array_merge($login_st_data,$ip_details);
		$admin_result=$this->db->insert('admin_login_history', $setdata);
		$current_product_id=$this->db->insert_id();
		return $current_product_id;
	} 
	public function getBrowser() {
		$u_agent = $_SERVER['HTTP_USER_AGENT'];
		$bname = 'Unknown';
		$platform = 'Unknown';
		$version= "";
		//First get the platform?
		if (preg_match('/linux/i', $u_agent)) {
			$platform = 'linux';
		}
		elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
			$platform = 'mac';
		}
		elseif (preg_match('/windows|win32/i', $u_agent)) {
			$platform = 'windows';
		}
		// Next get the name of the useragent yes seperately and for good reason
		if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent))
		{
			$bname = 'Internet Explorer';
			$ub = "MSIE";
		}
		elseif(preg_match('/Firefox/i',$u_agent))
		{
			$bname = 'Mozilla Firefox';
			$ub = "Firefox";
		}
		elseif(preg_match('/Chrome/i',$u_agent))
		{
			$bname = 'Google Chrome';
			$ub = "Chrome";
		}
		elseif(preg_match('/Safari/i',$u_agent))
		{
			$bname = 'Apple Safari';
			$ub = "Safari";
		}
		elseif(preg_match('/Opera/i',$u_agent))
		{
			$bname = 'Opera';
			$ub = "Opera";
		}
		elseif(preg_match('/Netscape/i',$u_agent))
		{
			$bname = 'Netscape';
			$ub = "Netscape";
		}
		// finally get the correct version number
		$known = array('Version', $ub, 'other');
		$pattern = '#(?<browser>' . join('|', $known) .
		')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
		if (!preg_match_all($pattern, $u_agent, $matches)) {
			// we have no matching number just continue
		}
		// see how many we have
		$i = count($matches['browser']);
		if ($i != 1) {
			//we will have two since we are not using 'other' argument yet
			//see if version is before or after the name
			if (strripos($u_agent,"Version") < strripos($u_agent,$ub)){
				$version= $matches['version'][0];
			}
			else {
				$version= $matches['version'][1];
			}
		}else {
			$version= $matches['version'][0];
		}
		// check if we have a number
		if ($version==null || $version=="") {$version="?";}
		return array(
			'userAgent' => $u_agent,
			'name'      => $bname,
			'version'   => $version,
			'platform'  => $platform,
			'pattern'    => $pattern
		);
	}
	public function logout($id) {
	
		$logout_st_data = array(
			'last_logout_date_time'	 => date('Y-m-d H:i:s'),
			);
				$this->db->where('id', $id);	
				$this->db->update('admins', $logout_st_data);
			   $history=$this->db->query('SELECT id FROM admin_login_history ORDER BY id DESC ')->row_array();
			   $history_id=$history['id'];  
				$this->db->where('id', $history_id);	
				return $this->db->update('admin_login_history', $logout_st_data);
   } 
   public function check_details() {
	  
	  
	  if($this->input->post("email")!=""){
	    $this->db->select("`id`, `role_id`, `name`,`user_type`, `user_name`, `email`, `mobile`, `password`, `created_date_time`, `updated_date_time`, `status`");
        $this->db->from('admins');
		 $this->db->where('status',1);
		  $this->db->group_start();
         $this->db->where("admins.email='".$this->input->post("email")."' OR admins.user_name='".$this->input->post("email")."'");
		 $this->db->group_end();
	    $query = $this->db->get();
		return $query->row_array();
		
	  }else{
	      return false;
	  }
	}
	
	
	//*******************8end use code admin panel*********************8
}