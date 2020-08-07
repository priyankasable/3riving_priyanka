<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/* Master helper contains all function which are used repeatedly*/

// function to get Main Service Category e.g. home services
function get_service_category()
{
	$CI =& get_instance();

	$CI->load->database();

	$sql = "SELECT * from tbl_category_master where is_deleted = 0";
 
    $rs = $CI->db->query($sql);
	
	return $rs;		
}

// function to get Service master e.g. repair & maintainace
function get_service_master()
{
	$CI =& get_instance();

	$CI->load->database();

	$sql = "SELECT tbl_servicesale_master.pk,service_name,category_pk,category_name from tbl_servicesale_master,tbl_category_master where tbl_servicesale_master.is_deleted = 0 and tbl_category_master.pk=tbl_servicesale_master.category_pk";
 
    $rs = $CI->db->query($sql);
	
	return $rs;		
}

//function to get sub service master e.g. electricel
function get_subservice_master()
{
	$CI =& get_instance();

	$CI->load->database();

	$sql = "SELECT tbl_sub_servicesale_master.pk,service_pk,tbl_servicesale_master.service_name,subservice_name,subservice_type,tbl_servicesale_master.pk as spk from tbl_sub_servicesale_master,tbl_servicesale_master where tbl_sub_servicesale_master.is_deleted = 0 and tbl_sub_servicesale_master.service_pk = tbl_servicesale_master.pk";
 
    $rs = $CI->db->query($sql);
	
	return $rs;		
}

//function to get location master 
function get_location()
{
	$CI =& get_instance();

	$CI->load->database();

	$sql = "SELECT pk,city_name from tbl_location_master where is_deleted = 0";
 
    $rs = $CI->db->query($sql);
	
	return $rs;		
}


//function to get state master 
function get_state()
{
	$CI =& get_instance();

	$CI->load->database();

	$sql = "SELECT pk,state from tbl_state where is_deleted = '0'";
 
    $rs = $CI->db->query($sql);
	
	return $rs;		
}

//function to get city master 
function get_city()
{
	$CI =& get_instance();

	$CI->load->database();

	$sql = "SELECT tbl_state.state,tbl_city.city,tbl_city.pk FROM tbl_city,tbl_state WHERE tbl_state.pk = tbl_city.state_id and tbl_city.is_deleted = '0'";
 
    $rs = $CI->db->query($sql);
	
	return $rs;		
}

//function to get area master 
function get_area()
{
	$CI =& get_instance();

	$CI->load->database();

	$sql = "SELECT tbl_city.city,tbl_area.area,tbl_area.pk FROM tbl_area,tbl_city WHERE tbl_city.pk = tbl_area.cityid and tbl_area.is_deleted = '0'";
	
    $rs = $CI->db->query($sql);
	
	return $rs;		
}

//function to get unit of measurements
function get_uom()
{
	$CI =& get_instance();

	$CI->load->database();

	$sql = "SELECT pk,uom from tbl_uom_master where is_deleted = 0";
 
    $rs = $CI->db->query($sql);
	
	return $rs;		
}

// function to get items
function get_items()
{
	$CI =& get_instance();

	$CI->load->database();

	$sql = "SELECT tbl_item_master.description, tbl_item_master.pk,tbl_item_master.category_pk,tbl_item_master.service_pk,item_name,tbl_uom_master.uom, tbl_sub_servicesale_master.subservice_name,fixed_charges,old_charges, tbl_servicesale_master.service_name from tbl_item_master,tbl_sub_servicesale_master,tbl_uom_master, tbl_servicesale_master where tbl_item_master.is_deleted = 0 and tbl_item_master.subservice_pk = tbl_sub_servicesale_master.pk and tbl_item_master.uom = tbl_uom_master.pk and tbl_item_master.service_pk = tbl_servicesale_master.pk";
 
    $rs = $CI->db->query($sql);
	
	return $rs;		
}

// function to get price of item
function get_price_master()
{
	$CI =& get_instance();
	$CI->load->database();
	$sql = "SELECT tbl_price_master.pk,effective_date,rate,old_rate,tbl_city.city as city_name,tbl_item_master.item_name from tbl_price_master,tbl_city,tbl_item_master where  tbl_city.pk = tbl_price_master.location and tbl_price_master.is_deleted = 0 and tbl_item_master.pk = tbl_price_master.item_pk";
 
    $rs = $CI->db->query($sql);
	
	return $rs;		
}


// function to get user name by pk
function get_user_name($pk)
{
	$CI =& get_instance();

	$CI->load->database();

	$sql = "SELECT first_name,last_name,mobile_no,email from tbl_users where pk=$pk";
 
    $rs = $CI->db->query($sql);
	
	return $rs;		
}

// function to get vendor name by pk
function get_vendor_name($pk)
{
	$CI =& get_instance();

	$CI->load->database();

	$sql = "SELECT first_name,middle_name,last_name,vendor_type,mobileno,email from tbl_vendor where pk=$pk";
 
    $rs = $CI->db->query($sql);
	
	return $rs;	

}


// function to get all users
function get_users()
{
	$CI =& get_instance();

	$CI->load->database();

	$sql = "SELECT pk,first_name,last_name,mobile_no,email from tbl_users where is_deleted='0'";
 
    $rs = $CI->db->query($sql);
	
	return $rs;		
}

// function to get vendors
function get_vendors()
{
	$CI =& get_instance();

	$CI->load->database();

	$sql = "SELECT * from tbl_vendor where is_active='Y' and is_deleted='0'";
 
    $rs = $CI->db->query($sql);
	
	return $rs;		
}

// function to get only home services
function get_home_service()
{
	$CI =& get_instance();

	$CI->load->database();

	$sql = "SELECT tbl_servicesale_master.pk,service_name,category_pk,category_name from tbl_servicesale_master,tbl_category_master where tbl_servicesale_master.is_deleted = 0 and tbl_category_master.pk=tbl_servicesale_master.category_pk and tbl_category_master.pk = 1";
 
    $rs = $CI->db->query($sql);
	
	return $rs;		
}

function get_health_service()
{

	$CI =& get_instance();

	$CI->load->database();

	$sql = "SELECT tbl_servicesale_master.pk,service_name,category_pk,category_name from tbl_servicesale_master,tbl_category_master where tbl_servicesale_master.is_deleted = 0 and tbl_category_master.pk=tbl_servicesale_master.category_pk and tbl_category_master.pk = 4";
 
    $rs = $CI->db->query($sql);
	
	return $rs;		

}


// function to get only seasonal services
function get_seasonal_service()
{
	$CI =& get_instance();

	$CI->load->database();

	$sql = "SELECT tbl_servicesale_master.pk,service_name,category_pk,category_name from tbl_servicesale_master,tbl_category_master where tbl_servicesale_master.is_deleted = 0 and tbl_category_master.pk=tbl_servicesale_master.category_pk and tbl_category_master.pk = 3";
 
    $rs = $CI->db->query($sql);
	
	return $rs;		
}

// function to get only catering services
function get_catering_service()
{
	$CI =& get_instance();

	$CI->load->database();

	$sql = "SELECT tbl_servicesale_master.pk,service_name,category_pk,category_name from tbl_servicesale_master,tbl_category_master where tbl_servicesale_master.is_deleted = 0 and tbl_category_master.pk=tbl_servicesale_master.category_pk and tbl_category_master.pk = 6";
 
    $rs = $CI->db->query($sql);
	
	return $rs;		
}


// function to get service_name by service_id

function service_name_byid($service_id)
{
	$CI =& get_instance();

	$CI->load->database();

	$sql = "SELECT service_name from tbl_servicesale_master where pk='$service_id'";
 
    $rs = $CI->db->query($sql);
	
	return $rs;			

}


//not neede for now----4 feb 2016
function generateRandomString($id,$name)
	{
		$CI =& get_instance();
		$CI->load->database();
		if($id!="")
		{
			$rsdata= $CI->db->query("select * from tbl_vendormaster");
			$rscount= $rsdata->num_rows();
			if($rscount<3)
			{
			$rscount=3;
			}
			$rsvendor= $CI->db->query("select vendor_code from tbl_vendormaster where pk=$id");
			$row = $rsvendor->row(); 
			$vendorcode=$row->vendor_code;
		}
		else
		{
			 $rscount= 2;
			 $vendorcode='S'.ucwords($name).'0001';
			// $vendorcode='SA0001';
		}		
		    //$x = 'ZZ998';
		   $x = 'ZZ9998';
			for($i = 0; $i <$rscount; $i++)  //$rscont is total no of record count
			 {
				$x++;
				if (strlen($x) > 6)
				//$x='SA0001';
				$x=$vendorcode;      //last insered vendor code value
			   //  echo $x,'<br />';
			}
			
		return $x;
	}
?>