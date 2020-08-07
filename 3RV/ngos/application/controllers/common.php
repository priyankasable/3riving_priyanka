<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Common extends MY_Controller
{
	function Common()
	{ 
		parent::__construct();
	}

	// common function to delete the record from database by using ajax and passing pk and table_name 
	function delete_record()
	{
		  $response = array('success'=>0,'error'=>0);
		  
		  $pk = $this->input->post('pk');
		  $table_name = $this->input->post('table_name');
	
			//delete record from database
			$where="pk='$pk'";
			$data = array('is_deleted' =>'1');
			
			$result= $this->mastermodel->update_data($table_name,$where,$data);
		  
			if($result)
			{
				$response['success'] = 1;
				$response['msg'] = "Record Deleted";
				echo json_encode($response);
			}
			else
			{
				$response['error'] = 1;
				$response['msg'] = "Try Again.";
				echo json_encode($response);
			}	
	}
	
	
	// common function to update status of record from database by using ajax and passing pk and table_name 
	function update_status()
	{
			$response = array('success'=>0,'error'=>0);
		  
			$str1=stripslashes($_POST['str']);
			$str1=explode("_",$str1);
			$status=$str1[0];
			$pk=$str1[1];
	
			if($status=="Y")
			{
			  $status="N";
			}else if($status=="N")
			{
			  $status="Y";
			}
			
			$table_name = $this->input->post('table_name');
	
			$where="pk='$pk'";
			$data = array('is_active' =>$status);
			
			$result= $this->mastermodel->update_data($table_name,$where,$data);
		  
			if($result)
			{
				$response['success'] = 1;
				$response['msg'] = "Status Updated.";
				echo json_encode($response);
			}
			else
			{
				$response['error'] = 1;
				$response['msg'] = "Try Again.";
				echo json_encode($response);
			}	
	}
}
?>