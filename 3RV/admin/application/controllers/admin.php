<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Admin extends MY_Controller
{

	public $imagepath = "http://localhost/3RV/website_content/";

	function Ngo()
	{ 
		parent::__construct();
	}
		
	
	
/*-------------------------NGO Listing -------------------------------------------*/

function index()
{	
	$data['rsngo'] = $this->db->query("select tbl_ngo.id,name,field_of_work,mobile_no ,email,location from tbl_ngo where tbl_ngo.is_deleted='0'");		
	
	$this->load->view('admin/listngo',$data);
}


/*--------------------------Student listing------------ */

function student_list()
{	
	$data['rsstud'] = $this->db->query("select tbl_student.pk,name,city,email,mobileno  from tbl_student where tbl_student.is_deleted='0'");		
	
	$this->load->view('admin/liststud',$data);
}

/*--------------------------Notice Board------------ */

function notice_board()
{	
	$where="pk=1";
	  	$data['rsdata']=$this->mastermodel->get_data('*','tbl_cms',$where,NULL,'pk desc',0,NULL);
	  	$this->load->view('admin/noticeboard',$data);
}


function check_title_already_exist()
	{   
		$pk=$_POST['pk'];
		$cms_title=trim(stripslashes($_POST['cms_title']));
		if($pk=="")
		{
			$r=$this->db->query("select cms_title from tbl_cms where cms_title='$cms_title' and is_deleted='0'");
		}
		else if($pk!="")	
		{
			$r=$this->db->query("select cms_title from tbl_cms where cms_title='$cms_title' and pk!='$pk' and is_deleted='0'");
		}
		if($cms_title!="")
		{
			if ($r->num_rows() > 0) 
			{
				 echo "false";
			}
			else{
		    	echo "true";
			 }
		
		}	
	}


	function save_cms()
	{
		$pk=$this->input->post('pk');
		$user_id=$this->session->userdata('kwickuser_id');
		$response=array('success'=>'0','error'=>'0');
		
		if($pk!="")
		{
			$where = array('pk' => $pk);
			$data = array('cms_desc' => $this->input->post('message'),
						  'edited_by_user' =>	$user_id,
						  'date_edited'=>date('Y-m-d h:i:s'));
			$result = $this->mastermodel->update_data('tbl_cms',$where,$data);
		}
		
		if($result)
		{
			$response['success'] =1;
			echo json_encode($response);	
		}
		else
		{
			$response['error'] =1;
			$response['errors'] = "Try Again";
			echo json_encode($response);	
		}
	}

			function resource_bank()
			{
				$data['page_title'] = "List Resource Bank";
				$data['rstask'] = $this->db->query("select * from tbl_resoursebank where tbl_resoursebank.is_deleted='0'");	
				$data['imagepath'] = $this->imagepath;	
				$this->load->view('admin/listresourse',$data);
			
			}
			
			function add_resourse_bank()
			{
				
				$data['page_title'] = "Add Resourse Bank";
				$data['save_action'] = base_url().'index.php/admin/save_resoursebank';
				$this->load->view('admin/addresourse',$data);
				
			}
			
			function save_resoursebank()
			{
				$this->form_validation->set_rules('rtitle','Resourse bank','trim|required|xss_clean');
							$this->form_validation->set_rules('agreement_doc', 'Resource Document','callback_agreementdoc_upload');


		if($this->form_validation->run() == FALSE)
		{
				 $this->add_resourse_bank();
		}
		else
		{
			if($_FILES['agreement_doc']['name'] !="")
			{
				 $upload_data = $this->upload_data['agreement_doc'];
				 $formate_doc = $upload_data['file_name'];
			}

		
			$data = array('title' => $this->input->post('rtitle'),
						'formate' => $formate_doc);
		
			$result = $this->mastermodel->add_data('tbl_resoursebank',$data);
			
			if($result)
			 {
				$this->session->set_flashdata('message', array('title' => 'Resourse Bank', 'content' =>"Resourse Bank Added", 'type' => 's' ));
				
				redirect('admin/resource_bank');
			 }
			 else
			 {
			   $this->session->set_flashdata('message', array('title' => 'Resource Bank', 'content' =>"Resource Bank Not Added ", 'type' => 'e' ));
			   
			   redirect('admin/add_resourse_bank');
			 }
		}
}

function agreementdoc_upload()
{	
	if($_FILES['agreement_doc']['name'] !="" )
	{
		$upload_dir = '../website_content/resource/';
		$config['upload_path']   = $upload_dir;
		$config['allowed_types'] = 'gif|jpg|png|jpeg|pdf|doc';
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
		$this->form_validation->set_message('agreementdoc_upload',"Please Select Resource Bank");
		return false;
	}
}

}
?>