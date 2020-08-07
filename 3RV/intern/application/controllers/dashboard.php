<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends MY_Controller
{
	function index()
	{			 
		 $data['rsnotice'] = $this->db->query("select * from tbl_cms where is_deleted='0'");
		 
		 //query for assigned task
		 $data['rsatask'] = $this->db->query("select tbl_ngo.name,tbl_student.resume,tbl_task.ngoid,tbl_task.description,tbl_task.subject,tbl_task.formate,tbl_task.deadline,tbl_stud_tasks.pk 
	 from tbl_task,tbl_ngo,tbl_stud_tasks,tbl_student 
	 where tbl_task.is_deleted='0' 
	 and tbl_ngo.is_deleted='0' 
	 and tbl_ngo.id = tbl_task.ngoid 
	 and tbl_stud_tasks.ngo_id  = tbl_ngo.id
	 and tbl_stud_tasks.task_id = tbl_task.pk
	 and tbl_stud_tasks.stud_id = tbl_student.pk
	 and tbl_stud_tasks.is_assign = 1");

		 
	 $this->load->view('dashboard/dashboard',$data);
	}
	
}
?>