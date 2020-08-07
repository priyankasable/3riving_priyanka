<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Internadmin extends MY_Controller
{
	public $imagepath = "http://localhost/3RV/website_content/";

	function Intern()
	{ 
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('intern');
		$this->load->helper('url');
		$this->load->helper('message');
	}
		
function index()
{	
	
}
		//list task
	function listtask()
	{
	    $data['imagepath'] = $this->imagepath;	

	   $data['rstask'] = $this->db->query("select tbl_ngo.name,tbl_task.pk,tbl_task.ngoid,tbl_task.description, 	tbl_task.subject,tbl_task.formate,tbl_task.deadline from tbl_task,tbl_ngo where tbl_task.is_deleted='0' and tbl_ngo.is_deleted='0' and tbl_ngo.id = tbl_task.ngoid");
	   
	   $this->load->view('admin/list',$data);
	}

//resource_bank
function resource_bank()
{
 		$data['imagepath'] = $this->imagepath;	
		$data['rstask'] = $this->db->query("select * from tbl_resoursebank where tbl_resoursebank.is_deleted='0'");
	   	$this->load->view('admin/listresourse',$data);
}


function edit_profile()
{
	 $id = $this->session->userdata('intern_id');
	 $where="pk=$id";
	 $data['imagepath'] = $this->imagepath;	
	 $data['saveaction']= base_url()."index.php/internadmin/save_profile";	
	 $data['rsdata']=$this->mastermodel->get_data('pk,name,password,city,location,email,mobileno,resume','tbl_student',$where,NULL,'pk desc',0,NULL);  
	  $this->load->view('admin/edit_profile',$data); 
}

function save_profile()
	{
		$image=$this->input->post('image');
		$pk=$this->session->userdata('intern_id');
						
		$this->form_validation->set_rules('sname', 'Intern name', 'required');
		$this->form_validation->set_rules('email', 'Email ID', 'required|callback_check_email');
		$this->form_validation->set_rules('password', 'password', 'required');
		$this->form_validation->set_rules('city', 'city', 'required');
		$this->form_validation->set_rules('location', 'location', 'required');
		$this->form_validation->set_rules('mobileno', 'mobileno', 'required');
		$this->form_validation->set_rules('image', 'Image', 'callback_image_upload');
										
		if ($this->form_validation->run() == FALSE)
		{
			$this->edit_profile($pk);
		}
	
		else
		{  
			$old_image=$this->input->post('old_image'); 
			        //conditions need while updating image
					if($old_image=="" && $_FILES['image']['name'] !="")
					{
						 $upload_data=$this->upload_data['file'];
						 $imagename=$upload_data['file_name'];
					 
					}else if($old_image!="" && $_FILES['image']['name'] =="")
					{
					 $imagename=$old_image;
					}
					else if($old_image!="" && $_FILES['image']['name']!="")
					{
						 $upload_data=$this->upload_data['file'];
					 	 $imagename=$upload_data['file_name'];
					}
			
			
				$where = array('pk' => $pk);
				$data = array('name' => $this->input->post('sname'),
							  'password' => $this->input->post('password'),
							  'city' =>$this->input->post('city'),
							  'resume'=>$imagename,
							  'location' => $this->input->post('location'),
							  'email' => $this->input->post('email'),
							  'mobileno' => $this->input->post('mobileno'),
							  'edited_by_user' =>	$pk,
							  'date_edited'=>date('Y-m-d h:i:s')						
							);
				$result = $this->mastermodel->update_data('tbl_student',$where,$data);
		
		if($result==1)
		{
			
			$this->session->set_flashdata('message', array( 'title' => 'Edit Profile', 'content' => 'Profile updated Sucessfully', 'type' => 's' ));
			redirect('internadmin/edit_profile');
		
		}
		else
		{
			$this->session->set_flashdata( 'message', array( 'title' => 'Edit Profile', 'content' => 'Error While updating Record!!!', 'type' => 'e' ));
			redirect('internadmin/edit_profile');
			
		}	
		
	  }
	}


	function check_email($email,$pk)
 	{
        $pk=$this->input->post('pk');
		$r=$this->db->query("select email from tbl_student where email='$email' and pk!='$pk' and is_deleted='0'");
		
		if ($r->num_rows() > 0) 
		{
		$this->form_validation->set_message("check_email", "This Emailid already exisits");
		return false;
		}
		else
		{
		return true;
		}
 }
	
	function image_upload()
	{
		$pk=$this->input->post('pk');
		$old_image=$this->input->post('old_image');

		if($_FILES['image']['name'] !="" || $old_image!="")
		{
		$upload_dir = '../website_content/resume/';
		$config['upload_path']   = $upload_dir;
		$config['allowed_types'] = 'gif|jpg|png|jpeg|pdf|doc';
		$config['file_name']     = rand()."_".$_FILES['image']['name'];
		$config['overwrite']     = false;
		$config['max_size']	 = '5120';
		
		$this->upload->initialize($config);
		
		if($this->upload->do_upload('image'))
		{
			$this->upload_data['file'] = $this->upload->data(); //get uploaded image file array
			$info= $this->upload->data();
			
			if($old_image!="")
				{
					unlink("website_content/resume/".$old_image);
				}
			return true;
		}
			
		else
		{
			 if($_FILES['image']['name']!= ""  && $old_image=="")
			 {
				// get file upload error -
				$error =  $this->upload->display_errors();
				
				// srore error in array -
				$this->form_validation->set_message('image_upload', $error);
				return false;
		    }
		}	
	}
	  else if($_FILES['image']['name'] == ""  && $old_image==""){
		$this->form_validation->set_message('image_upload', "No file selected");
		return false;
	}
}

function applytask()
{

		$pk = $this->input->post('pk');
		$ngoid = $this->input->post('ngoid');
		$data = array('ngo_id' => $ngoid,
					  'task_id' => $pk,
					  'stud_id ' => $this->session->userdata('intern_id'),
					  'applydate' 	=> date('Y-m-d'));

		$result = $this->mastermodel->add_data('tbl_stud_tasks',$data);
		
		
		if($result)
		{
			$response['resp'] = 1;
			$response['msg'] = "Successfully applied to task !!!";
			echo json_encode($response);
		}
		else
		{
			$response['resp'] = 2;
			$response['msg'] = "Try Again.";
			echo json_encode($response);
		}	
}

function task_submission()
{
	$sid  = $this->session->userdata('intern_id');
	$data['imagepath'] = $this->imagepath;	
	$data['rsatask'] = 	$this->db->query("select tbl_ngo.name,tbl_student.resume,tbl_task.ngoid,tbl_task.description,tbl_task.subject,tbl_task.formate,tbl_task.deadline,tbl_stud_tasks.pk 
	 from tbl_task,tbl_ngo,tbl_stud_tasks,tbl_student 
	 where tbl_task.is_deleted='0' 
	 and tbl_ngo.is_deleted='0' 
	 and tbl_ngo.id = tbl_task.ngoid 
	 and tbl_stud_tasks.ngo_id  = tbl_ngo.id
	 and tbl_stud_tasks.task_id = tbl_task.pk
	 and tbl_stud_tasks.stud_id='$sid' 
	 and tbl_stud_tasks.stud_id = tbl_student.pk
	 and tbl_stud_tasks.is_assign = 1");
	
	$this->load->view('admin/submittask',$data);
}

function tasksubmit($studtaskid="")
{
	if($studtaskid=="")
	{
		redirect('internadmin/task_submission');

	}
	else
	{
		$data['save_action'] = "";
	    $data['imagepath'] = $this->imagepath;	
		$data['page_title'] = "Submit Task";
		$data['rsatask'] = 	$this->db->query("select tbl_ngo.name,tbl_task.ngoid,tbl_task.description,tbl_task.subject,tbl_task.formate,tbl_task.deadline,tbl_stud_tasks.pk 
	 from tbl_task,tbl_ngo,tbl_stud_tasks,tbl_student 
	 where tbl_task.is_deleted='0' 
	 and tbl_ngo.is_deleted='0' 
	 and tbl_ngo.id = tbl_task.ngoid 
	 and tbl_stud_tasks.ngo_id  = tbl_ngo.id
	 and tbl_stud_tasks.task_id = tbl_task.pk
	 and tbl_stud_tasks.stud_id = tbl_student.pk
	 and tbl_stud_tasks.pk = $studtaskid");

		$this->load->view('admin/uploadtask',$data);
	}
}


}
?>