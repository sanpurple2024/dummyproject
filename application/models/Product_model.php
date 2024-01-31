<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Product_model extends CI_Model {
	public function __construct() {
        parent::__construct();
    }
    
  
    
    public function add_countries_excel_file_record($upload_data){

		$result = array();
		foreach($upload_data as $key => $value){
		    
		     $str_name = str_replace(["®","/",",", "&", "@", "$", "_", "#",".","!","^","?","(",")","+"," "],   "-",  $value['product_name'] );
		    	
		   
		    
			$area_check=$this->db->query('SELECT * FROM product WHERE  product_name="'.$value['product_name'].'"')->num_rows();
			$country = strtolower($value['product_name']);		
			$country = trim($country);	
			
	    if($area_check==0){
			if($value['product_name']!=''){
			   
			    //categories id fetch
			  if($value['category']!=""){  
			      
			    $category_check=$this->db->query('SELECT * FROM categories WHERE  category_name="'.$value['category'].'"')->num_rows();
			    $category_result=$this->db->query('SELECT * FROM categories WHERE  category_name="'.$value['category'].'"')->result();
			    
			    if($category_check>0){
			        $categories_id = $category_result[0]->id;
			    }else{
			        $cat_name = str_replace(["®","/",",", "&", "@", "$", "_", "#",".","!","^","?","(",")","+"," "],   "-",  $value['category'] );
			        $categories_data['category_name'] = $value['category'];
			        $categories_data['cat_slug'] = $cat_name;
			        $categories_data['status'] = "1";
			        $this->db->insert("categories",$categories_data);
	              	$categories_id = $this->db->insert_id();
			    }
			}else{
			    $categories_id = "";
			}
			    
			    //product brand fetch
			    
			    if($value['brand']!=""){
			    
    			    $brand_check=$this->db->query('SELECT * FROM product_brand WHERE  brand_name="'.$value['brand'].'"')->num_rows();
    			    $brand_result=$this->db->query('SELECT * FROM product_brand WHERE  brand_name="'.$value['brand'].'"')->result();
    			    
    			    if($brand_check>0){
    			       $brand_id = $brand_result[0]->id;
    			    }else{
    			        $brand_slug = str_replace(["®","/",",", "&", "@", "$", "_", "#",".","!","^","?","(",")","+"," "],   "-",  $value['brand'] );
    			        $brand_data['brand_name'] = $value['brand'];
    			        $brand_data['brand_slug'] = $brand_slug;
    			        $brand_data['is_active'] = "1";
    			        
    			        
    			        $this->db->insert("product_brand",$brand_data);
    	              	$brand_id = $this->db->insert_id();
    			    }
			    
        	    }else{
        	        $brand_id = "";
        	    }
			  $chr="";
			    
				$set_data1 = array(
					'product_name' => ($value['product_name']!="") ? $value['product_name'] : "",
					'slug'=>$str_name,
					'actual_price'=>($value['actual_price']!="") ? $value['actual_price'] : "",
					'selling_price'=>($value['selling_price']!="") ? $value['selling_price'] : "",
					'weight'=>($value['net_weight']!="") ? $value['net_weight'] : "",
					'stocks'=>($value['total_stock']!="") ? $value['total_stock'] : "",
					'out_of_stock'=>($value['out_of_stock']!="") ? $value['out_of_stock'] : "",
					'manufacture'=>($value['manufacture']!="") ? str_replace($chr,"'",addslashes($value['manufacture'])) : "",
					'manufacture_address'=>($value['manufacture_address']!="") ? str_replace($chr,"'",addslashes($value['manufacture_address'])) : "",
					'brand_name'=>$brand_id,
					'category'=>$categories_id,
					'description'=>($value['description']!="") ? $value['description'] : "",
					'long_description'=>($value['long_description']!="") ? $value['long_description'] : "",
					'status'=>'1',
					'product_image1'=>($value['product_image1']!="") ? $value['product_image1'] : "",
					'product_image2'=>($value['product_image2']!="") ? $value['product_image2'] : "",
					'product_image3'=>($value['product_image3']!="") ? $value['product_image3'] : "",
					'product_image4'=>($value['product_image4']!="") ? $value['product_image4'] : "",
					'product_image5'=>($value['product_image5']!="") ? $value['product_image5'] : "",
					
				);

				$result_data 	= $this->db->insert("product", $set_data1);
			}
			
			
				$result_data =1;
		}
		else{
			$result_data =0;
		   }
		}
// 		die;
		
	      return 1;
	}
    
  
}
?>