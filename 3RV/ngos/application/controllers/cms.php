<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); /*---- to dispaly Our Services sectioncms About us dynamically on homepage---by kirti k on 1 jan 2016-*/

class Cms extends MY_Controller
{
	function Cms()
	{
		parent::__construct();
	}
		
	function view_cms()
	{	
	    $where="is_deleted='0'";	
	 	$data['rscms']=$this->mastermodel->get_data('*','tbl_cms',$where,NULL,'pk desc',0,NULL);
		$this->load->view('website_content/cms/view_cms',$data);
	}
	function add_cms()
	{	
		$where="pk=1";
	  	$data['rsdata']=$this->mastermodel->get_data('*','tbl_cms',$where,NULL,'pk desc',0,NULL);
	  	$this->load->view('website_content/cms/add_cms',$data);
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
	
	function edit_cms($id)
 	{
	  $where="pk=$id";
	  $data['rsdata']=$this->mastermodel->get_data('*','tbl_cms',$where,NULL,'pk desc',0,NULL);
	  $this->load->view('website_content/cms/add_cms',$data);
	  
 	}
	function check_status()
	{
		//$pk=$_POST['pk'];
		$str1=stripslashes($_POST['str']);
		$str1=explode("_",$str1);
		
		 $str=$str1[0];
		 $pk=$str1[1];
		
		$response=array('success'=>'0','error'=>'0');
	    if($str=="Y")
		{
		  $status="N";
		}else if($str=="N")
		{
		  $status="Y";
		}
	
	$where="pk=$pk";
	$data=array('is_active'=>$status,);
	$result = $this->mastermodel->update_data('tbl_cms',$where,$data);
	            if($result)
				 {
					 $response['success'] =1;
					 $response['status'] =$status;
					 $response['pk'] =$pk;
					 echo json_encode($response);	
				 }
				 else
				 {
				 	 $response['error'] =1;
					 echo json_encode($response);	
				 }
		
	}
	function read_more_desc()
 	{
		 $pk=$_POST['pk'];
	  	 $where="pk=$pk";
	 	 $desc=$this->mastermodel->get_data('cms_desc','tbl_cms',$where,NULL,'pk desc',0,NULL);
		 foreach($desc->result() as $row)
		 {
		    $sdesc=$row->cms_desc;
		 
		 }
		             $response=array('success'=>'0','error'=>'0');
					 $response['success'] =1;
					 $response['desc'] =$sdesc;
					 
					 echo json_encode($response);
	  
 	}	
	 function delete_cms()
 	{
		   $pk=$_POST['pk'];
	  		$where="pk=$pk";
	 	    $desc=$this->mastermodel->delete_data('tbl_cms',$where);
			if($desc)
				{
		              $response=array('success'=>'0','error'=>'0');
					 $response['success'] =1;
					
				}	 
					 echo json_encode($response);
	  
 	}	
 
	
}
?>