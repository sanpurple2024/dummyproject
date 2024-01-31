<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
function get_session_data(){ 
	$CI= & get_instance();		
	$CI->load->library('session');
	$CI->load->helper('url');
	$userData=$CI->session->userdata('customer_data');
	return $userData;
} 


// function insert_history_project($arrayData){
//     $CI =& get_instance();
//     $CI->db->insert("history_project", $arrayData);
//     return $CI->db->insert_id();
// }



function curl_api_fn($url,$type,$fields){
	$CI= & get_instance();	
	$curl = curl_init();
	curl_setopt_array($curl, array(
	CURLOPT_URL => $url,
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_ENCODING => '',
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 0,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST =>$type,
	CURLOPT_POSTFIELDS => $fields,
	CURLOPT_HTTPHEADER => array(
	'Cookie: ci_session=b9e65601b154cb83e8cd0c0e5c1aa14787f13c4d'
	),
	));
	$response = curl_exec($curl);
	curl_close($curl);	
	return $response;
}
function check_admin_login($type){
$CI= & get_instance();		
$CI->load->library('session');
$CI->load->helper('url');
$check=$CI->session->userdata('user');
if($check != $type){
redirect(base_url().'master/login');
}
}
function check_member_login()
{ 
	$CI= & get_instance();		
	$CI->load->library('session');
	$CI->load->helper('url');
	$member_id=$CI->session->userdata('customer_data');
	if(empty($member_id)){
		redirect(base_url().'member/login');
		exit;
	}
} 
function d_m_y_conversion($getdate){
return date("d-m-Y", strtotime($getdate));
}
function y_m_d_conversion($getdate){
return date("Y-m-d", strtotime($getdate));
}
function y_m_d_hisconversion($getdate){
return date("Y-m-d H:i:s", strtotime($getdate));
}

function DateTimeconversion($getdate){
if(trim($getdate)!='0000-00-00 00:00:00' && trim($getdate)!=''){
return date('d-M-Y (h:i A)', strtotime($getdate));
}else{
return '';
}
}

function Dateconversion($getdate){
if(trim($getdate)!='0000-00-00'){
return date('d-M-Y', strtotime($getdate));
}else{
return '';
}
}
function Timeconversion($getdate){
if(trim($getdate)!='00:00:00' && trim($getdate)!=''){
return date('h:i A', strtotime($getdate));
}else{
return '';
}
}
function Datebreakconversion($getdate){
if(trim($getdate)!='0000-00-00 00:00:00'){
return date('d-m-Y', strtotime($getdate)).'<br>'.date('(h:i A)', strtotime($getdate));
}else{
return '';
}
}

function round_price($str){
	return str_replace(',','',number_format(floatval($str),2));
	
}
function numberFormat($num){
	return preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $num);
	
}

function getDaysAgo($lastloginTime){
	$estimate_time = time() - strtotime($lastloginTime);

    if( $estimate_time < 1 )
    {
        return 'less than 1 second ago';
    }

    $condition = array(
                12 * 30 * 24 * 60 * 60  =>  'year',
                30 * 24 * 60 * 60       =>  'month',
                24 * 60 * 60            =>  'day',
                60 * 60                 =>  'hour',
                60                      =>  'minute',
                1                       =>  'second'
    );

    foreach( $condition as $secs => $str )
    {
        $d = $estimate_time / $secs;

        if( $d >= 1 )
        {
            $r = round( $d );
            return  $r . ' ' . $str . ( $r > 1 ? 's' : '' ) . ' ago';
        }
    }
	
}
function dateDiffInDays($date1, $date2)  
{
    $diff = strtotime($date2) - strtotime($date1);
    return abs(round($diff / 86400)); 
}
function getProfilePhoto($photo,$gender){
	if(!empty($photo)){
		return $photo;
	}else{
		 return ($gender) ? 'male.png' : 'female.png';
	}
	
}
function getBlurPhoto($image){
	 $data = pathinfo(site_url()."assets/images/members/".$image); 
	$imagePath=$data['dirname'].'/'.$data['basename'];
	$extension=$data['extension'];
	header("content-type: image/png");
	switch ($extension) {
		case 'jpeg':
			$image = imagecreatefromjpeg($imagePath);
			break;
		case 'jpg':
			$image = imagecreatefromjpeg($imagePath);
			break;
		case 'gif':
			$image = imagecreatefromgif($imagePath);
			break;
		case 'png':
			$image = imagecreatefrompng($imagePath);
			break;
		default:
			return false;
	}
	for ($x=1; $x<=50; $x++)
	{
		imagefilter($image, IMG_FILTER_GAUSSIAN_BLUR);
	}
	imagepng($image);
	imagedestroy($image);
	
	return $image;
} 
function split_str($str) 
{
if(!empty($str)){
$url_name=	strtolower($str);
$url_name1 = stripslashes(str_replace("'", '', $url_name));
$url_name2 = str_replace(str_split('~[\\\\/:&+*?"<>|]~'), '-', $url_name1);
$url_name2 = str_replace(str_split('()'), '', $url_name2);
$url_name3 = preg_replace('/[^A-Za-z0-9]/', '-',$url_name2);
$url_name3 = stripslashes(str_replace("---", '-', $url_name3));
$url_name3 = stripslashes(str_replace("--", '-', $url_name3));
}
return $url_name3;	
}

function Genearate_Password(){
$pwddigt  =  substr(rand(1,1000000),0,4); 
$password =   'PWD'.$pwddigt;
return $password;	
}
function Genearate_Email_verification_code(){
$randomletter = substr(str_shuffle("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz"), 0, 8);
return $randomletter;
}
function Genearate_Member_Id($member_prefix,$gender_identification_no,$member_starting_count){
	$reference_id=$member_prefix;
	if($gender_identification_no!=''){
		$reference_id=$reference_id.$gender_identification_no;
	}
if (strlen($member_starting_count) == 1) {
		$reference_id = $reference_id.'00000'.$member_starting_count;
	}else if (strlen($member_starting_count) == 2) {
		$reference_id = $reference_id.'0000'.$member_starting_count;
	}else if (strlen($member_starting_count) == 3) {
		$reference_id = $reference_id.'000'.$member_starting_count;
	}else if (strlen($member_starting_count) == 4) {
		$reference_id = $reference_id.'00'.$member_starting_count;
	}else if (strlen($member_starting_count) == 5) {
		$reference_id = $reference_id.'0'.$member_starting_count;
	}
	else if (strlen($member_starting_count) == 6) {
		$reference_id = $reference_id.$member_starting_count;
	}
	return $reference_id;
}

function Get_order_id($lastId){
	if (strlen($lastId) == 1) {
		$reference_id = 'ORDR'.'0000' .$lastId;
	} else if (strlen($lastId) == 2) {
		$reference_id = 'ORDR'.'000'.$lastId;
	} else if (strlen($lastId) == 3) {
		$reference_id = 'ORDR'.'00'.$lastId;
	} else if (strlen($lastId) == 4) {
		$reference_id = 'ORDR'.'0'.$lastId;
	}
	else {
		$reference_id = 'ORDR'.$last_id;
	}
	return $reference_id;
}

function Get_add_on_order_id($lastId){
	if (strlen($lastId) == 1) {
		$reference_id = 'ADORDR'.'0000' .$lastId;
	} else if (strlen($lastId) == 2) {
		$reference_id = 'ADORDR'.'000'.$lastId;
	} else if (strlen($lastId) == 3) {
		$reference_id = 'ADORDR'.'00'.$lastId;
	} else if (strlen($lastId) == 4) {
		$reference_id = 'ADORDR'.'0'.$lastId;
	}
	else {
		$reference_id = 'ADORDR'.$last_id;
	}
	return $reference_id;
}

function get_url($str) 
{
if(!empty($str)){
$url_name=	strtolower(trim($str));
$url_name1 = stripslashes(str_replace("'", '', $url_name));
$url_name2 = str_replace(str_split('~[\\\\/:&+*?"<>|]~'), '-', $url_name1);
$url_name2 = str_replace(str_split('()'), '', $url_name2);
$url_name3 = preg_replace('/[^A-Za-z0-9]/', '-',$url_name2);
$url_name3 = stripslashes(str_replace("---", '-', $url_name3));
$url_name3 = stripslashes(str_replace("--", '-', $url_name3));
}
return $url_name3;	
}
function get_common_string($str) 
{
if(!empty($str)){
$url_name=	strtolower($str);
$url_name1 = stripslashes(str_replace("'", '', $url_name));
$url_name2 = str_replace(str_split('~[\\\\/:&+*?"<>|]~'), '', $url_name1);
$url_name2 = str_replace(str_split('()'), '', $url_name2);
$url_name3 = preg_replace('/[^A-Za-z0-9]/', '',$url_name2);
$url_name3 = stripslashes(str_replace("---", '', $url_name3));
$url_name3 = stripslashes(str_replace("--", '', $url_name3));
}
return $url_name3;	
}
function Get_match_score($member_details, $partner_preferences)  
{
	$marital_status =explode(',', $partner_preferences['marital_status']);	
	$have_children_status =explode(',', $partner_preferences['have_children_status']);	
	$physical_status =explode(',', $partner_preferences['physical_status']);	
	$eating_habits_status =explode(',', $partner_preferences['eating_habits_status']);	
	$drinking_habits_status =explode(',', $partner_preferences['drinking_habits_status']);	
	$smoking_habits_status =explode(',', $partner_preferences['smoking_habits_status']);	
	$have_dosham =explode(',', $partner_preferences['have_dosham']);	
	$employment_type =explode(',', $partner_preferences['employment_type']);	
	$preferred_caste_ids =explode(',', $partner_preferences['preferred_caste_ids']);	
	$preferred_mother_tongue_ids =explode(',', $partner_preferences['preferred_mother_tongue_ids']);	
	$preferred_birth_star_ids =explode(',', $partner_preferences['preferred_birth_star_ids']);	
	$preferred_country_ids =explode(',', $partner_preferences['preferred_country_ids']);	
	$preferred_state_ids =explode(',', $partner_preferences['preferred_state_ids']);	
	$preferred_district_ids =explode(',', $partner_preferences['preferred_district_ids']);	
	$preferred_citizenship_ids =explode(',', $partner_preferences['preferred_citizenship_ids']);
	$occupation_ids =explode(',', $partner_preferences['occupation_ids']);
	$education_ids =explode(',', $partner_preferences['education_ids']);
	$match_score=0;
	if( (empty($partner_preferences['age_from']) && empty($partner_preferences['age_to'])) || ($member_details['age_in_years']>=$partner_preferences['age_from'] || $member_details['age_in_years']<=$partner_preferences['age_to']) ){
		$match_score+=5;
	}
	if( (empty($partner_preferences['height_from']) && empty($partner_preferences['height_to'])) || ($member_details['height_id']>=$partner_preferences['height_from'] && $member_details['height_id']<=$partner_preferences['height_to']) ){
		$match_score+=5;
	}
	if(empty($partner_preferences['marital_status']) || in_array($member_details['marital_status'], $marital_status)){
		$match_score+=5;
	}
	if(empty($partner_preferences['have_children_status']) || ($member_details['children_living_status']==$partner_preferences['have_children_status'])){
		$match_score+=3;
	}
	if(empty($partner_preferences['physical_status']) || ($member_details['physical_status']==$partner_preferences['physical_status'])){
		$match_score+=3;
	}
	if(empty($partner_preferences['eating_habits_status']) || in_array($member_details['eating_habits_status'], $eating_habits_status)){
		$match_score+=3;
	}
	if(empty($partner_preferences['drinking_habits_status']) || in_array($member_details['drinking_habits_status'], $drinking_habits_status)){
		$match_score+=3;
	}
	if(empty($partner_preferences['smoking_habits_status']) || in_array($member_details['smoking_habits_status'], $smoking_habits_status)){
		$match_score+=3;
	}
	if(empty($partner_preferences['preferred_religion_id']) || $member_details['religion_id']==$partner_preferences['preferred_religion_id']){
		$match_score+=10;
	}
	if(empty($partner_preferences['preferred_caste_ids']) || in_array($member_details['caste_id'], $preferred_caste_ids)){
		$match_score+=10;
	}
	if(empty($partner_preferences['preferred_mother_tongue_ids']) || in_array($member_details['mother_tongue_id'], $preferred_mother_tongue_ids)){
		$match_score+=5;
	}
	if(empty($partner_preferences['preferred_birth_star_ids']) || in_array($member_details['birth_star_id'], $preferred_birth_star_ids)){
		$match_score+=3;
	}
	if(empty($partner_preferences['have_dosham']) || $member_details['have_dosham']==$partner_preferences['have_dosham']){
		$match_score+=3;
	}
	if(empty($partner_preferences['education_ids']) || in_array($member_details['education_id'], $education_ids)){
		$match_score+=3;
	}
	if(empty($partner_preferences['employment_type']) || in_array($member_details['employment_type'], $employment_type)){
		$match_score+=3;
	}
	if(empty($partner_preferences['occupation_ids']) || in_array($member_details['occupation_id'], $occupation_ids)){
		$match_score+=3;
	}
	if( (empty($partner_preferences['income_from_value']) && empty($partner_preferences['income_to_value'])) || ($member_details['income_from_value']>=$partner_preferences['income_from_value'] && $member_details['income_to_value']<=$partner_preferences['income_to_value']) ){
		$match_score+=3;
	}
	if(empty($partner_preferences['preferred_country_ids']) || in_array($member_details['country_id'], $preferred_country_ids)){
		$match_score+=3;
	}
	if(empty($partner_preferences['preferred_state_ids']) || in_array($member_details['state_id'], $preferred_state_ids)){ 
		$match_score+=3;
	}
	if(empty($partner_preferences['preferred_district_ids']) || in_array($member_details['district_id'], $preferred_district_ids)){ 
		$match_score+=5;
	}
	if(empty($partner_preferences['preferred_citizenship_ids']) || in_array($member_details['citizenship_id'], $preferred_citizenship_ids)){ 
		$match_score+=3;
	}
	if(empty($partner_preferences['own_house_status']) || ($member_details['own_house']==$partner_preferences['own_house_status'])){ 
		$match_score+=3;
	}
	if( (empty($partner_preferences['preferred_property_from_value']) && empty($partner_preferences['preferred_property_to_value'])) || ($member_details['property_from_value']>=$partner_preferences['preferred_property_from_value'] && $member_details['property_to_value']<=$partner_preferences['preferred_property_to_value']) ){
		$match_score+=3;
	}
	if( (empty($partner_preferences['preferred_expected_willing_from_value']) && empty($partner_preferences['preferred_expected_willing_to_value'])) || ($member_details['expected_willing_from_value']>=$partner_preferences['preferred_expected_willing_from_value'] && $member_details['expected_willing_to_value']<=$partner_preferences['preferred_expected_willing_to_value']) ){
		$match_score+=3;
	}
	if( (empty($partner_preferences['no_of_sisters'])) || ($partner_preferences['no_of_sisters']==1 && $member_details['no_of_sisters']>=1) ){
		$match_score+=2;
	}
	if( (empty($partner_preferences['no_of_brothers'])) || ($partner_preferences['no_of_brothers']==1 && $member_details['no_of_brothers']>=1) ){
		$match_score+=2;
	}
    return round($match_score); 
}

/* Paytm Helpers Start */

 function paytm_data($mode)	
	{ 	
   if(trim($mode)=='TEST'){
	$result['PAYTM_TXN_URL']='TEST';
	$result['PAYTM_ENVIRONMENT']='TEST';
	$result['PAYTM_MERCHANT_KEY']='rrIFP919JDsc!9xQ';
	$result['MID']='Travel08391233947221';
	$result['PAYTM_MERCHANT_WEBSITE']='WEB_STAGING';
	$result['CHANNEL_ID']='WEB';
	$result['INDUSTRY_TYPE_ID']='Retail';
	 
	}else{
	$result['PAYTM_TXN_URL']='PROD';
	$result['PAYTM_ENVIRONMENT']='PROD';
	$result['PAYTM_MERCHANT_KEY']='5sVBjHiSRGOw4sao';
	$result['MID']='TRAINN43760507490919';
	$result['PAYTM_MERCHANT_WEBSITE']='TRAINNWEB';
	$result['CHANNEL_ID']='WEB';
	$result['INDUSTRY_TYPE_ID']='Retail109';
	}
	$PAYTM_DOMAIN = "pguat.paytm.com";
	if($result['PAYTM_ENVIRONMENT'] == 'PROD') {$PAYTM_DOMAIN = 'secure.paytm.in';}
	$result['PAYTM_REFUND_URL']='https://'.$PAYTM_DOMAIN.'/oltp/HANDLER_INTERNAL/REFUND';
	$result['PAYTM_STATUS_QUERY_URL']='https://'.$PAYTM_DOMAIN.'/oltp/HANDLER_INTERNAL/TXNSTATUS';
	$result['PAYTM_STATUS_QUERY_NEW_URL']='https://'.$PAYTM_DOMAIN.'/oltp/HANDLER_INTERNAL/getTxnStatus';
	$result['PAYTM_TXN_URL']='https://'.$PAYTM_DOMAIN.'/oltp-web/processTransaction';
	
return $result;
}	

function encrypt_e($input, $ky) {
	$key = $ky;
	$size = @mcrypt_get_block_size(MCRYPT_RIJNDAEL_128, 'cbc');
	$input = pkcs5_pad_e($input, $size);
	$td = @mcrypt_module_open(MCRYPT_RIJNDAEL_128, '', 'cbc', '');
	$iv = "@@@@&&&&####$$$$";
	@mcrypt_generic_init($td, $key, $iv);
	$data = @mcrypt_generic($td, $input);
	@mcrypt_generic_deinit($td);
	@mcrypt_module_close($td);
	$data = base64_encode($data);
	return $data;
}
function decrypt_e($crypt, $ky) {
	$crypt = base64_decode($crypt);
	$key = $ky;
	$td = mcrypt_module_open(MCRYPT_RIJNDAEL_128, '', 'cbc', '');
	$iv = "@@@@&&&&####$$$$";
	mcrypt_generic_init($td, $key, $iv);
	$decrypted_data = mdecrypt_generic($td, $crypt);
	mcrypt_generic_deinit($td);
	mcrypt_module_close($td);
	$decrypted_data = pkcs5_unpad_e($decrypted_data);
	$decrypted_data = rtrim($decrypted_data);
	return $decrypted_data;
}
function pkcs5_pad_e($text, $blocksize) {
	$pad = $blocksize - (strlen($text) % $blocksize);
	return $text . str_repeat(chr($pad), $pad);
}
function pkcs5_unpad_e($text) {
	$pad = ord($text{strlen($text) - 1});
	if ($pad > strlen($text))
		return false;
	return substr($text, 0, -1 * $pad);
}
function generateSalt_e($length) {
	$random = "";
	srand((double) microtime() * 1000000);
	$data = "AbcDE123IJKLMN67QRSTUVWXYZ";
	$data .= "aBCdefghijklmn123opq45rs67tuv89wxyz";
	$data .= "0FGH45OP89";
	for ($i = 0; $i < $length; $i++) {
		$random .= substr($data, (rand() % (strlen($data))), 1);
	}
	return $random;
}
function checkString_e($value) {
	if ($value == 'null')
		$value = '';
	return $value;
}
function getChecksumFromArray($arrayList, $key, $sort=1) {
	if ($sort != 0) {
		ksort($arrayList);
	}
	$str = getArray2Str($arrayList);
	$salt = generateSalt_e(4);
	$finalString = $str . "|" . $salt;
	$hash = hash("sha256", $finalString);
	$hashString = $hash . $salt;
	$checksum = encrypt_e($hashString, $key);
	return $checksum;
}
function getChecksumFromString($str, $key) {
	$salt = generateSalt_e(4);
	$finalString = $str . "|" . $salt;
	$hash = hash("sha256", $finalString);
	$hashString = $hash . $salt;
	$checksum = encrypt_e($hashString, $key);
	return $checksum;
}
function verifychecksum_e($arrayList, $key, $checksumvalue) {
	$arrayList = removeCheckSumParam($arrayList);
	ksort($arrayList);
	$str = getArray2StrForVerify($arrayList);
	$paytm_hash = decrypt_e($checksumvalue, $key);
	$salt = substr($paytm_hash, -4);
	$finalString = $str . "|" . $salt;
	$website_hash = hash("sha256", $finalString);
	$website_hash .= $salt;
	$validFlag = "FALSE";
	if ($website_hash == $paytm_hash) {
		$validFlag = "TRUE";
	} else {
		$validFlag = "FALSE";
	}
	return $validFlag;
}
function verifychecksum_eFromStr($str, $key, $checksumvalue) {
	$paytm_hash = decrypt_e($checksumvalue, $key);
	$salt = substr($paytm_hash, -4);
	$finalString = $str . "|" . $salt;
	$website_hash = hash("sha256", $finalString);
	$website_hash .= $salt;
	$validFlag = "FALSE";
	if ($website_hash == $paytm_hash) {
		$validFlag = "TRUE";
	} else {
		$validFlag = "FALSE";
	}
	return $validFlag;
}
function getArray2Str($arrayList) {
	$findme   = 'REFUND';
	$findmepipe = '|';
	$paramStr = "";
	$flag = 1;	
	foreach ($arrayList as $key => $value) {
		$pos = strpos($value, $findme);
		$pospipe = strpos($value, $findmepipe);
		if ($pos !== false || $pospipe !== false) 
		{
			continue;
		}
		
		if ($flag) {
			$paramStr .= checkString_e($value);
			$flag = 0;
		} else {
			$paramStr .= "|" . checkString_e($value);
		}
	}
	return $paramStr;
}
function getArray2StrForVerify($arrayList) {
	$paramStr = "";
	$flag = 1;
	foreach ($arrayList as $key => $value) {
		if ($flag) {
			$paramStr .= checkString_e($value);
			$flag = 0;
		} else {
			$paramStr .= "|" . checkString_e($value);
		}
	}
	return $paramStr;
}
function redirect2PG($paramList, $key) {
	$hashString = getchecksumFromArray($paramList);
	$checksum = encrypt_e($hashString, $key);
}
function removeCheckSumParam($arrayList) {
	if (isset($arrayList["CHECKSUMHASH"])) {
		unset($arrayList["CHECKSUMHASH"]);
	}
	return $arrayList;
}
function getTxnStatus($requestParamList) {
	return callAPI(PAYTM_STATUS_QUERY_URL, $requestParamList);
}
function getTxnStatusNew($requestParamList) {
	return callNewAPI(PAYTM_STATUS_QUERY_NEW_URL, $requestParamList);
}
function initiateTxnRefund($requestParamList) {
	$CHECKSUM = getRefundChecksumFromArray($requestParamList,PAYTM_MERCHANT_KEY,0);
	$requestParamList["CHECKSUM"] = $CHECKSUM;
	return callAPI(PAYTM_REFUND_URL, $requestParamList);
}
function callAPI($apiURL, $requestParamList) {
	$jsonResponse = "";
	$responseParamList = array();
	$JsonData =json_encode($requestParamList);
	$postData = 'JsonData='.urlencode($JsonData);
	$ch = curl_init($apiURL);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
	curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);                                                                  
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
	curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, 0);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                         
	'Content-Type: application/json', 
	'Content-Length: ' . strlen($postData))                                                                       
	);  
	$jsonResponse = curl_exec($ch);   
	$responseParamList = json_decode($jsonResponse,true);
	return $responseParamList;
}
function callNewAPI($apiURL, $requestParamList) {
	$jsonResponse = "";
	$responseParamList = array();
	$JsonData =json_encode($requestParamList);
	$postData = 'JsonData='.urlencode($JsonData);
	$ch = curl_init($apiURL);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
	curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);                                                                  
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
	curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, 0);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                         
	'Content-Type: application/json', 
	'Content-Length: ' . strlen($postData))                                                                       
	);  
	$jsonResponse = curl_exec($ch);   
	$responseParamList = json_decode($jsonResponse,true);
	return $responseParamList;
}
function getRefundChecksumFromArray($arrayList, $key, $sort=1) {
	if ($sort != 0) {
		ksort($arrayList);
	}
	$str = getRefundArray2Str($arrayList);
	$salt = generateSalt_e(4);
	$finalString = $str . "|" . $salt;
	$hash = hash("sha256", $finalString);
	$hashString = $hash . $salt;
	$checksum = encrypt_e($hashString, $key);
	return $checksum;
}
function getRefundArray2Str($arrayList) {	
	$findmepipe = '|';
	$paramStr = "";
	$flag = 1;	
	foreach ($arrayList as $key => $value) {		
		$pospipe = strpos($value, $findmepipe);
		if ($pospipe !== false) 
		{
			continue;
		}
		
		if ($flag) {
			$paramStr .= checkString_e($value);
			$flag = 0;
		} else {
			$paramStr .= "|" . checkString_e($value);
		}
	}
	return $paramStr;
}
function callRefundAPI($refundApiURL, $requestParamList) {
	$jsonResponse = "";
	$responseParamList = array();
	$JsonData =json_encode($requestParamList);
	$postData = 'JsonData='.urlencode($JsonData);
	$ch = curl_init($apiURL);	
	curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, 0);
	curl_setopt($ch, CURLOPT_URL, $refundApiURL);
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);  
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
	$headers = array();
	$headers[] = 'Content-Type: application/json';
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);  
	$jsonResponse = curl_exec($ch);   
	$responseParamList = json_decode($jsonResponse,true);
	return $responseParamList;
}

function  replace_above(){
	return array("B/W","Above","B&#47;W;","B/;W;","B/W;"); 
}
function  replace_hours(){
	return array("hours","HOURS","Hours","Hrs","hrs");
}
function  replace_starttime(){
	return array("*","of Bus Start Time");
}
/* Paytm Helpers End */