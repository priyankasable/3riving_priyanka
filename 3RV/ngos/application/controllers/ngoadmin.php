<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Ngoadmin extends MY_Controller
{
	public $imagepath = "http://localhost/3RV/website_content/";

	function Ngo()
	{ 
		parent::__construct();
				
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->helper('message');
	}
		
function index()
{	
	$data['rsngo'] = $this->db->query("select tbl_ngo.id,name,field_of_work,mobile_no ,email,location from tbl_ngo where tbl_ngo.is_deleted='0'");		
	
	$this->load->view('admin/listngo',$data);
}


		//list task
	function listtask()
	{
	   $id =$this->session->userdata('ngo_id');
	   $data['imagepath'] = $this->imagepath;	

	   $data['rstask'] = $this->db->query("select * from tbl_task where tbl_task.is_deleted='0' and ngoid='$id' ");
	   $this->load->view('admin/list',$data);
	}

	function addtask()
	{
		$data['page_title'] = "Add Task";
		$data['save_action'] = base_url().'index.php/ngoadmin/insert_task';
		$this->load->view('admin/addtasks',$data);
	}
			
			function insert_task()
			{
				$this->form_validation->set_rules('tsub','Task Subject','trim|required|xss_clean');
				$this->form_validation->set_rules('deadline','Task Duration','trim|required|xss_clean');
				$this->form_validation->set_rules('desc','Task Description','trim|required|xss_clean');
				$this->form_validation->set_rules('agreement_doc','Task Formate','callback_agreementdoc_upload');


		if($this->form_validation->run() == FALSE)
		{
				 $this->addtask();
		}
		else
		{
			if($_FILES['agreement_doc']['name'] !="")
			{
				 $upload_data = $this->upload_data['agreement_doc'];
				 $formate_doc = $upload_data['file_name'];
			}
			

			$data = array('ngoid' => $this->session->userdata('ngo_id'),
						  'subject ' => $this->input->post('tsub'),
						  'description' => $this->input->post('desc'),
						  'deadline' => $this->input->post('deadline'),
						  'formate' =>  $formate_doc);

			$result = $this->mastermodel->add_data('tbl_task',$data);
			if($result)
			 {
				$this->session->set_flashdata('message', array('title' => 'Task', 'content' =>"Task Added", 'type' => 's' ));
				
				redirect('ngoadmin/listtask');
			 }
			 else
			 {
			   $this->session->set_flashdata('message', array('title' => 'Task', 'content' =>"Task Not Added ", 'type' => 'e' ));
			   
			   redirect('ngoadmin/addtask');
			 }
		}
}

function agreementdoc_upload()
{	
	if($_FILES['agreement_doc']['name'] !="" )
	{
		$upload_dir = '../website_content/tasks/';
		$config['upload_path']   = $upload_dir;
		$config['allowed_types'] = 'doc|gif|jpg|png|jpeg|pdf';
		$config['file_name']     = rand()."_".$_FILES['agreement_doc']['name'];
		$config['overwrite']     = false;
		$config['max_size']	 = '5120';
		
		$this->upload->initialize($config);
		
		if($this->upload->do_upload('agreement_doc'))
		{
			$this->upload_data['agreement_doc'] = $this->upload->data(); //get uploaded image file array
			return true;
		}
		else
		{
			// get file upload error -
			$error =  $this->upload->display_errors();
			
			// srore error in array -
			$this->form_validation->set_message('agreementdoc_upload', $error);
			return false;
		}
	}	
	else if($_FILES['agreement_doc']['name'] == "")
	{
		$this->form_validation->set_message('agreementdoc_upload',"Please Select Formate of Task");
		return false;
	}
}

function deletetask()
{
		$pk = $this->input->post('pk');
		$where = array('pk' => $pk);
		$result = $this->mastermodel->delete_data('tbl_task',$where);
		
		if($result)
		{
			$response['resp'] = 1;
			$response['msg'] = "Record Deleted";
			echo json_encode($response);
		}
		else
		{
			$response['resp'] = 2;
			$response['msg'] = "Try Again.";
			echo json_encode($response);
		}	
}

//resource_bank
function resource_bank()
{
		$data['imagepath'] = $this->imagepath;	
 		$data['rstask'] = $this->db->query("select * from tbl_resoursebank where tbl_resoursebank.is_deleted='0'");
	   	$this->load->view('admin/listresourse',$data);
}


function task_applications()
{

	 $ngoid = $this->session->userdata('ngo_id');
	 $data['imagepath'] = $this->imagepath;	

	 $data['rstask'] = $this->db->query("select tbl_student.name,tbl_student.resume,tbl_task.ngoid,tbl_task.description,tbl_task.subject,tbl_task.formate,tbl_task.deadline,tbl_stud_tasks.pk 
	 from tbl_task,tbl_ngo,tbl_stud_tasks,tbl_student 
	 where tbl_task.is_deleted='0' 
	 and tbl_ngo.is_deleted='0' 
	 and tbl_ngo.id = tbl_task.ngoid 
	 and tbl_stud_tasks.ngo_id  = tbl_ngo.id
	 and tbl_stud_tasks.task_id = tbl_task.pk
	 and tbl_stud_tasks.ngo_id='$ngoid' 
	 and tbl_stud_tasks.stud_id = tbl_student.pk");
	   
	 $this->load->view('admin/assigntask',$data);

}

function assigntask()
{

		$pk = $this->input->post('pk');
		
		$where = array('pk' => $pk);
		$data = array('is_assign' => 1,
					  'assigndate' 	=> date('Y-m-d'));

		$result = $this->mastermodel->update_data('tbl_stud_tasks',$where,$data);
		
		
		if($result)
		{
			$response['resp'] = 1;
			$response['msg'] = "Successfully Assigned!!!";
			echo json_encode($response);
		}
		else
		{
			$response['resp'] = 2;
			$response['msg'] = "Try Again.";
			echo json_encode($response);
		}	
}

}
?>