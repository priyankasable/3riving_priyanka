<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

// function to check already applied to task 
function get_apply_status($sid,$nid,$tid)
{
	$CI =& get_instance();
	$CI->load->database();
	$sql = "SELECT * from tbl_stud_tasks where ngo_id='$nid' and task_id='$tid' and stud_id='$sid'";
    $rs = $CI->db->query($sql);
	$rscount= $rs->num_rows();
	return $rscount;		
}
?>