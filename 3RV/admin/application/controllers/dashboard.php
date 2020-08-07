<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends MY_Controller
{
	function index()
	{	
		 
		 /*--------------------------------- Master Counts -----------------------------*/
	$ngo_query = $this->db->query("select * from tbl_task where is_deleted='0'");
    $intern_query = $this->db->query("select * from tbl_student where is_deleted='0'");
    $task_query = $this->db->query("select * from tbl_task where is_deleted='0'");
		
	$data['ngocnt'] = $ngo_query->num_rows();
	$data['interncnt'] = $intern_query->num_rows();
	$data['taskcnt'] = $task_query->num_rows();
		
	$this->load->view('dashboard/dashboard',$data);
	
	}
	
}
?>