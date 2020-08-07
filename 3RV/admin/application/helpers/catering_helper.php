<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/* Master helper contains all function which are used repeatedly*/

//function to get foodtype
function get_foodtype()
{
	$CI =& get_instance();
	$CI->load->database();

	$sql = "SELECT tbl_catering_food_type.pk,catering_food_type,item_name,quantity,itemid from tbl_catering_food_type,tbl_item_master where tbl_catering_food_type.is_deleted = 0 and tbl_catering_food_type.itemid = tbl_item_master.pk";
 
    $rs = $CI->db->query($sql);
	return $rs;		
}


//function to get food
function get_food()
{
	$CI =& get_instance();

	$CI->load->database();
	
	$sql = "SELECT tbl_catering_food.pk,catering_food_type_id,catering_food,tbl_catering_food_type.catering_food_type from tbl_catering_food,tbl_catering_food_type where tbl_catering_food.is_deleted = 0 and  tbl_catering_food.catering_food_type_id = tbl_catering_food_type.pk";

    $rs = $CI->db->query($sql);
	return $rs;		
}

?>