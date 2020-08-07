<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

// function to check already applied to task 
function get_assign_status($pk)
{
	$CI =& get_instance();
	$CI->load->database();
	$sql = "SELECT is_assign from tbl_stud_tasks where pk='$pk'";
    $rs = $CI->db->query($sql);
	return $rs;		
}
?>