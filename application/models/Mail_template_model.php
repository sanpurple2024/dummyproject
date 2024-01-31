<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Mail_template_model extends CI_Model {
	public function __construct()
	{
	parent::__construct();
	}
	public function get_controlles($id){
	  return $this->db->query('SELECT * FROM controllers WHERE id="'.$id.'"')->row_array();
	}
	public function get_sms_temp($id){
		return $this->db->query('SELECT * FROM sms_templates WHERE id="'.$id.'"')->row_array();
	}
	public function get_email_temp($id){
		return $this->db->query('SELECT * FROM email_templates WHERE id="'.$id.'"')->row_array();
	}
	public function getWebSettings($id){
	return $this->db->query('SELECT * FROM web_settings WHERE id="'.$id.'"')->row_array();	
	}
	public function get_social_links(){
	return $this->db->query('SELECT * FROM contact_us_details WHERE id="1"')->row_array();	
	}
	public function sms_login_details(){
		return $this->db->query('SELECT * FROM sms_gateway WHERE id="1"')->row_array();	
	}
	public function get_multiple_admins(){
		return $this->db->query('SELECT * FROM admin_mobiles_emails')->result_array();	
	}
public function setMailTemplate($id,$event){
		$this->db->select('content');
		$this->db->from('email_templates');
		$this->db->where('id',$id);	
		$this->db->or_where('event',$event);		
		$result=$this->db->get();
		$result=$result->row_array();
		return $result['content'];
	}
	public function getMailHeader(){
		$mailHead		= 	$this->setMailTemplate(1,'header');
		$logo		= 	$this->getWebSettings(1);
		$contact	= 	$this->getWebSettings(1);
		$website	=	str_replace("{WEBSITE}",site_url(),$mailHead);
		$folder		=	str_replace("{FOLDER}",'assets/images/logo/',$website);
		$logo		=	str_replace("{LOGO}",$logo['logo'],$folder);
		$email		=	str_replace("{EMAIL}",$contact['mail_template_admin_email'],$logo);
		$phone		=	str_replace("{PHONE}",$contact['mail_template_admin_mobile'],$email);
		return $phone;
	}
	public function getMailFooter(){
		$mailFoot		= 	$this->setMailTemplate(2,'footer');
		$social		= 	$this->get_social_links();
		$web_settings		= 	$this->getWebSettings(1);
		$thanks_regards	=	str_replace("{ADDRESS}",$_SERVER['SERVER_NAME'],$mailFoot);
		$hostname		=	str_replace("{HOSTNAME}",$web_settings['host_name'],$thanks_regards);
		$website		=	str_replace("{WEBSITE}",site_url(),$hostname);
		$folder			=	str_replace("{FOLDER}",'images',$website);
		$facebook_link	=	str_replace("{FACEBOOK}",$social['facebook_link'],$folder);
		$twitter_link	=	str_replace("{TWITTER}",$social['twitter_link'],$facebook_link);
// 		$youtube_link	=	str_replace("{YOUTUBE}",$social['youtube_link'],$twitter_link);
// 		$result = $youtube_link;
        $result = $website;
		return $result;
	}
	function get_content($string,$data){
	$website=array('{WEBSITE}'=>base_url());
     $final_data		=	array_merge($data,$website);		
	return @strtr($string,$final_data);
	}
	function send_mail_sms($user_type,$controller_id,$email_temp_id='',$sms_temp_id='',$array_data,$name,$email,$mobile,$site_name_status=''){
			$controller=$this->get_controlles($controller_id);
	
			if($controller['email_sending_status']==1 && $email_temp_id !=''){
				$email_temp=$this->get_email_temp($email_temp_id);
				$email_data=$this->get_content($email_temp['content'],$array_data);
				
				$reason=$email_temp['event'];
				$email_data_ar=array();
				$email_data_ar['content']=$email_data;
				$email_data_ar['event']=$email_temp['event'];
				$email_data_ar['subject']=$email_temp['subject'];
				$this->mail_send($email,$email_data_ar,$name,$user_type);
			}
		    if($controller['sms_sending_status']==1 && $sms_temp_id !=''){
				$sms_temp=$this->get_sms_temp($sms_temp_id);
				$sms_data=$this->get_content($sms_temp['sms_template'],$array_data);
				$reason=$sms_temp['sms_event'];
				$dlt_template_id=$sms_temp['dlt_template_id'];
				// $this->send_sms($mobile,$sms_data,$reason,$user_type,$site_name_status,$dlt_template_id);
			}
	}
	function send_mail_sms_for_activities($user_type,$controller_id,$partner_mobile_setting_preferences,$partner_email_setting_preferences,$email_temp_id='',$sms_temp_id='',$array_data,$name,$email,$mobile,$site_name_status=''){
			$controller=$this->get_controlles($controller_id);
			if($controller['email_sending_status']==1 && $email_temp_id !='' && $partner_email_setting_preferences==1){
				$email_temp=$this->get_email_temp($email_temp_id);
				$email_data=$this->get_content($email_temp['content'],$array_data);
				$reason=$email_temp['event'];
				$email_data_ar=array();
				$email_data_ar['content']=$email_data;
				$email_data_ar['event']=$email_temp['event'];
				$email_data_ar['subject']=$email_temp['subject'];
				$this->mail_send($email,$email_data_ar,$name,$user_type);
			}
		    if($controller['sms_sending_status']==1 && $sms_temp_id !='' && $partner_mobile_setting_preferences==1){
				$sms_temp=$this->get_sms_temp($sms_temp_id);
				$sms_data=$this->get_content($sms_temp['sms_template'],$array_data);
				$reason=$sms_temp['sms_event'];
				$dlt_template_id=$sms_temp['dlt_template_id'];
				$this->send_sms($mobile,$sms_data,$reason,$user_type,$site_name_status,$dlt_template_id);
			}
	}
	function send_direct_sms($mobile,$sms_data='',$name){
		  if($sms_data !=''){
           $this->send_sms($mobile,$sms_data,'Direct SMS',2,1);
			}
	}
	public function mail_send($email,$template,$name,$user_type){
	   
       $adminmail = $this->getWebSettings(1);
		$current_ip_address =  $_SERVER['REMOTE_ADDR'];	
		$header = $this->getMailHeader();
		$footer = $this->getMailFooter();
		$content=$header.$template['content'].$footer;
		$this->load->library('email');
		$this->email->from($adminmail['mail_template_admin_email']);
		$this->email->to($email);
		$this->email->set_mailtype("html");
		$this->email->subject($template['subject']);
		$this->email->message($content);
		$record_data = array(
					'email' => stripslashes($email),
					'event' => $template['event'],
					'name' => stripslashes($name),
					'subject' => $template['subject'],
					'email_message' => $content,
					'user_type' => $user_type,
					'sent_date_time'=> date('y-m-d H:i:s'),
				);
			
				
				
		$record_data['sent_status']= ($this->email->send()) ? 1 : 0;
		
		$result = $this->db->insert('email_history', $record_data);
		return $result;
	}
// 	public function send_sms($mobile_no,$sms_message,$reason,$user_type,$site_name_status='',$dlt_template_id=''){
// 	$sms_login_details=$this->sms_login_details();
// 	$sender_id=$sms_login_details['sender_id'];
// 	$authKey=$sms_login_details['authKey'];
// 	if($site_name_status==1){
// 		$sms_message=$sms_message.' - '.$_SERVER['SERVER_NAME'];
// 	}else{
// 		$sms_message=$sms_message;
// 	}
// 	$message=urlencode($sms_message);
// 		if(count($sms_login_details) !=''){

// 			/*$params = array( 
// 				'username' => $sms_login_details['username'],
// 				'password' => $sms_login_details['password'],
// 				'from' => $sms_login_details['sender_id'], 
// 				'to' =>$mobile_no, 
// 				'message' =>$sms_message
// 			);
// 		    $Ch=curl_init(); 
// 			curl_setopt($Ch, CURLOPT_URL,$sms_login_details['api_url']); 
// 			curl_setopt($Ch, CURLOPT_POST, true); 
// 			curl_setopt($Ch, CURLOPT_POSTFIELDS,http_build_query($params)); 
// 			curl_setopt($Ch, CURLOPT_RETURNTRANSFER, true); 
// 			$result=curl_exec($Ch);*/
// 			$url="http://control.c2sms.com/api/sendhttp.php?authkey=".$authKey."&mobiles=".$mobile_no."&message=".$message."&sender=".$sender_id."&route=4&DLT_TE_ID=".$dlt_template_id;
// 			//echo '<pre>';print_r($url);exit;
// 			$result = file($url);
// 			//echo '<pre>';print_r($result);exit;
// 			$record_data = array(
// 			'mobile_no' => stripslashes($mobile_no),
// 			'message' => stripslashes($sms_message) ,
// 			'event' =>  stripslashes($reason),
// 			'user_type' =>  $user_type,
// 			'sent_date_time'=> date('y-m-d H:i:s'),
// 			);
// 			if(!empty($result)){
//                 $record_data['sent_status']=1;
// 			  } else{
// 				$record_data['sent_status']=0;
// 		     }
// 			$this->db->insert('sms_history', $record_data); 
// 			return $result;
// 		}
// 	}
	
	public function forward_profile_mail_send($email,$email_temp_id,$array_data,$name,$from_mail_id,$user_type){
		$email_temp=$this->get_email_temp($email_temp_id);
		$email_data=$this->get_content($email_temp['content'],$array_data);
		$reason=$email_temp['event'];
		$email_data_ar=array();
		$email_data_ar['content']=$email_data;
		$email_data_ar['event']=$email_temp['event'];
		$email_data_ar['subject']=$email_temp['subject'];
		
		$adminmail = $this->getWebSettings(1);
		$current_ip_address =  $_SERVER['REMOTE_ADDR'];	
		$header = $this->getMailHeader();
		$footer = $this->getMailFooter();
		$content=$header.$email_data_ar['content'].$footer;
		$this->load->library('email');
		$this->email->from($from_mail_id);
		$this->email->to($email);
		$this->email->set_mailtype("html");
		$this->email->subject($email_data_ar['subject']);
		$this->email->message($content);
		$record_data = array(
					'email' => stripslashes($email),
					'event' => $email_data_ar['event'],
					'name' => stripslashes($name),
					'subject' => $email_data_ar['subject'],
					'email_message' => $content,
					'user_type' => $user_type,
					'sent_date_time'=> date('y-m-d H:i:s'),
				);
		if($this->email->send()){
			$record_data['sent_status']=1;
		}else{ 
		$record_data['sent_status']=0;
		}
		$result = $this->db->insert('email_history', $record_data);
		return $result;
	}
	function send_mail_for_new_matches($user_type,$controller_id,$email_template,$mobile,$email,$name,$site_name_status=''){
			$controller=$this->get_controlles($controller_id);
			if($controller['email_sending_status']==1 && !empty($email_template)){
				$email_data_ar=array();
				$email_data_ar['content']=$email_template;
				$email_data_ar['event']="New Matches Alert";
				$email_data_ar['subject']="Have a look into your new matches";
				$adminmail = $this->getWebSettings(1);
				$this->load->library('email');
				$this->email->from($adminmail['mail_template_admin_email']);
				$this->email->to($email);
				$this->email->set_mailtype("html");
				$this->email->subject($email_data_ar['subject']);
				$this->email->message($email_template);
				$record_data = array(
							'email' => stripslashes($email),
							'event' => $email_data_ar['event'],
							'name' => stripslashes($name),
							'subject' => $email_data_ar['subject'],
							'email_message' => $email_template,
							'user_type' => $user_type,
							'sent_date_time'=> date('y-m-d H:i:s'),
						);
				if($this->email->send()){
					$record_data['sent_status']=1;
				}else{ 
				$record_data['sent_status']=0;
				}
				$result = $this->db->insert('email_history', $record_data);
				return $result;
			}
		
	}
	public function SendSMS()
	{
		$dlt_id="1707163040126748130";
		$authKey = "366594AjOlVtW9qIG612f5831P1";
		$mobileNumber = "918121115444";
		$senderId = "MANTSN";
		$message=urlencode("Hii, THis is sample message");
		$route = "default";
		// $url="http://control.c2sms.com/api/sendhttp.php?authkey=366594AjOlVtW9qIG612f5831P1&mobiles=918121115444&message=Your%20OTP%20is%3A852369%20Thank%20You%20for%20Your%20Interest%20in%20AnandKaaraz.%20Msn&sender=MANTSN&route=4&DLT_TE_ID=1707163040126748130";
		$url="http://control.c2sms.com/api/sendhttp.php?authkey=366594AjOlVtW9qIG612f5831P1&mobiles=".$mobileNumber."&message=".$message."&sender=MANTSN&route=4&DLT_TE_ID=".$dlt_id;
		//echo '<pre>';print_r($url);exit;
		$ret = file($url);
		echo '<pre>';print_r($ret);exit;
		$postData = array(
		    'authkey' => $authKey,
		    'mobiles' => $mobileNumber,
		    'message' => $message,
		    'sender' => $senderId,
		    'route' => $route
		);
	    $url="http://control.c2sms.com/api/sendhttp.php";
	    $ch = curl_init();
		curl_setopt_array($ch, array(
		    CURLOPT_URL => $url,
		    CURLOPT_RETURNTRANSFER => true,
		    CURLOPT_POST => true,
		    CURLOPT_POSTFIELDS => $postData
		    //,CURLOPT_FOLLOWLOCATION => true
		));
	    //Ignore SSL certificate verification
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);


		//get response
		$output = curl_exec($ch);

		//Print error if any
		if(curl_errno($ch))
		{
		    echo 'error:' . curl_error($ch);
		}

		curl_close($ch);

		echo $output;exit;
		return $result;
		
	}

}