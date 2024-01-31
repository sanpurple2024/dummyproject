<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Customer_model extends CI_Model {
	public function __construct() {
		parent::__construct();
	}
	
	
    //  public function get_customer($args=array()){
      
    //     $this->db->select("t1.*,t2.country_name AS country_name,t3.state_name AS state_name,t4.city_name AS city_name");
    //     $this->db->from('customer as t1');
    //     $this->db->join('countries as t2','t1.country = t2.id','left');
    //     $this->db->join('states as t3','t2.id = t3.country_id','left');
    //     $this->db->join('cities as t4','t4.state_id = t3.id','left');
    //     if(!empty($args['id'])){
    //       $this->db->where('t1.id', $args['id']);
    //     }
    //     $this->db->group_by('t1.id','DESC');
    //     $query = $this->db->get();
      
    //     $result=$query->result_array();
    //     return  $result;
        
        
    // }
}