<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class MY_Model extends CI_Model
{
    public function __construct()
    {
		parent::__construct();
	}
    
	// function to get all fields from table -
    public function get_data($fields = '*', $table, $conditions = NULL, $joins = NULL, $order = NULL, $start = 0, $limit = NULL)
    {
        if($conditions != NULL)
		{
            if(is_array($conditions))
			{
                $this->db->where($conditions);
            }
			else
			{
                $this->db->where($conditions, NULL, FALSE);
            }
        }
		
		if($joins != NULL)
		{
			if(is_array($joins))
			{
				foreach($joins as $key => $value)
				{
					$this->db->join($key, $value);
				}
			}
			else
			{
				$this->db->join($joins);
			}
		}
		
        if($fields != NULL)
		{
            $this->db->select($fields);
        }

        if($order != NULL)
		{
            $this->db->order_by($order);
        }

        if($limit != NULL)
		{
            $this->db->limit($limit, $start);
        }
		
        $query = $this->db->get($table);

		return $query;
    }

	// function to get count of records with WHERE condition -
    public function get_count($table, $conditions = NULL, $joins = NULL)
    {
        $data = $this->get_data('COUNT(*) AS total', $table, $conditions, $joins);

        if($data->num_rows() > 0)
		{
            return $data->row()->total;
        }
		else
		{
            return FALSE;
        }
    }

	// function to insert data into table -
    public function add_data($table, $data = NULL)
    {
        if ($data == NULL)
		{
            return FALSE;
        }
		
		$this->db->trans_start();
		
		$data['date_added'] = date('Y-m-d h:i:s');
		$data['added_by_user'] = $this->session->userdata('user_id');

        $this->db->insert($table, $data);
        //$this->insert_d = $this->db->insert_id();
		
		if ($this->db->trans_status() === FALSE)
		{
			$this->db->trans_rollback();
			return FALSE;
		}
		else
		{
			$this->db->trans_commit();
			return TRUE;
		}
    }

	// function to update data in table -
    public function update_data($table, $conditions = NULL, $data = NULL)
    {
        if($data == NULL)
		{
            return FALSE;
        }

        if ($conditions != NULL)
		{
			if(is_array($conditions))
			{
				$this->db->where($conditions);
			}
			else
			{
				$this->db->where($conditions, NULL, FALSE);
			}
		}
		else
		{
			return FALSE;
		}
		
		$data['date_edited'] 	= date('Y-m-d h:i:s');
		$data['edited_by_user'] = $this->session->userdata('user_id');
			
		$this->db->update($table, $data);
		
		if($this->db->trans_status() === FALSE)
		{
			$this->db->trans_rollback();
			return FALSE;
		}
		else
		{
			$this->db->trans_commit();
			return TRUE;
		}
    }

	// function to delete record from table -
    public function delete_data($table, $conditions = NULL)
    {
		// NOTE : here we not actually delete record from database, we just update is_deleted flag from 0 to 1
			
        if($conditions != NULL)
		{
			if(is_array($conditions))
			{
				$this->db->where($conditions);
			}
			else
			{
				$this->db->where($conditions, NULL, FALSE);
			}
		}
		
		$this->db->trans_start();
			
		$data = array('is_deleted' => '1', 'deleted_by_user' => $this->session->userdata('userid'), 'date_deleted' => date('Y-m-d h:i:s'));
			
		$this->db->update($table, $data);
			
		if($this->db->trans_status() === FALSE)
		{
			$this->db->trans_rollback();
			return FALSE;
		}
		else
		{
			$this->db->trans_commit();
			return TRUE;
		}
    }
	
	// function to get next id of table -
	public function get_next_id($table)
    {
        return (int) $this->db->select('AUTO_INCREMENT')
            ->from('information_schema.TABLES')
            ->where('TABLE_NAME', $table)
            ->where('TABLE_SCHEMA', $this->db->database)->get()->row()->AUTO_INCREMENT;
    }
	
	// function to redirect page with flashdata -
	public function redirect($result = TRUE, $page1, $page2, $action = 'Added')
	{
		if($result === TRUE)
		{
			$this->session->set_flashdata( 'message', array( 'title' => 'Success', 'content' => 'Record '.$action.' Successfully.', 'type' => 's' ));
				
			redirect($page1);
		}
		else
		{
			$this->session->set_flashdata( 'message', array( 'title' => 'Error', 'content' => 'Record Not '.$action.'.', 'type' => 'e' ));
				
			redirect($page2);
		}
	}
	
	// function to convert date from dd-mm-yyyy to yyyy-mm-dd before insert into database -
	public function date_convert($date = NULL, $format = 'd-m-Y')
    {
        if($date != NULL)
		{
			if(strpos($date, '/') !== FALSE)
			{
				$date = str_replace('/', '-', $date);
			}
			
			if(strtolower($format) === 'ymd')
			{
				$format = 'Y-m-d';
			}
			else
			{
				$format = 'd-m-Y';
			}
			return date($format, strtotime($date));
		}
		else
		{
			return FALSE;
		}
    }
	
	// function to convert date format from dd-mm-yyyy to yyyy-mm-dd in form data array -
	public function date_format($data)
    {
		if(is_array($data))
		{
			foreach($data as $key => $value)
			{
				if($value !== '')
				{
					if(strpos($value, '/') !== FALSE || strpos($value, '-') !== FALSE)
					{
						$new_date = $this->date_convert($value, 'ymd');
						
						$data[$key] = $new_date;
					}
				}
			}
			return $data;
		}
		else
		{
			return FALSE;
		}
    }
	
	// function to get field value by id -
	public function get_name_by_id($field, $table, $id = null)
    {
        $data = $this->db->get_where($table, array('pk' => $id));

        if ($data->num_rows() > 0)
		{
            return $data->row()->$field;
        }
		else
		{
            return FALSE;
        }
    }
	
	// function to export data as CSV -
	public function csv_export($query, $file_name = 'export')
    {
		if( ! is_object($query) or ! method_exists($query, 'list_fields'))
        {
			return FALSE;
        }
	
        $this->load->dbutil();
		$this->load->helper('file');
		$this->load->helper('download');
		
		$delimiter = ",";
        $newline = "\r\n";
		
		$data = $this->dbutil->csv_from_result($query, $delimiter, $newline);
		
		force_download($file_name.'.csv', $data);
    }
	
	// function to import data from csv to mysql -
	public function csv_import($table, $file_path)
    {
		// load csv import library -
		$this->load->library('csvimport');
		 
		if($this->csvimport->get_array($file_path)) 
		{
			$csv_array = $this->csvimport->get_array($file_path);
			
			foreach ($csv_array as $row) 
			{
				$insert_data = array(
									'assign_to' 	=> $row['owner'],
									'name' 			=> $row['name'],
									'mobile_no' 	=> $row['mobile_no'],
									'source' 		=> $row['source'],
								   
									'date_added' 	=> date('Y-m-d h:i:s'),
									'added_by_user' => $this->session->userdata('intern_id')
				);
				
				$this->db->insert($table, $insert_data);
			}
			
			return TRUE;
		}
		else
		{
			return FALSE;
		}
    }
	
	// Download Database Backup
	function db_backup($file_name = 'DB_Backup', $format = 'zip')
   	{
		// Load the DB utility class
		$this->load->dbutil();
			
		// Set Prefrences For Download File.
		$prefs = array(
			'format'      => $format,       // gzip, zip, txt
			'filename'    => $file_name,	// File name - NEEDED ONLY WITH ZIP FILES
			'add_drop'    => TRUE,          // Whether to add DROP TABLE statements to backup file
			'add_insert'  => TRUE,          // Whether to add INSERT data to backup file
			'newline'     => "\n"        	// Newline character used in backup file
		);
		  
		// Backup your entire database and assign it to a variable
		$backup =& $this->dbutil->backup($prefs);
			
		// Load the file helper and write the file to your server
		//$this->load->helper('file');
		//write_file('/path/to/mybackup.gz', $backup); 
			
		// Load the download helper and send the file to your desktop
		$this->load->helper('download');
		
		// download file in zip format
		force_download($file_name.'_'.date("d-m-Y").'.'.$format, $backup);
	}
	

	
	// function to ulpoad multiple files -
	function upload_file($field_name = NULL, $files = NULL, $config = NULL, $multiple = FALSE)
	{
		// check for empty parameters -
		if($field_name == NULL or $files == NULL or $config == NULL)
		{
            return FALSE;
        }
	
		// define array for uploaded file names -
		$file_name_array = array();
		
		// define array for file upload error -
		$file_error_array = array();
		
		// get count of no. of files in array -
		$count = count($files[$field_name]['tmp_name']);
		
		for($i = 0; $i < $count; $i++)
		{
			// get each file details -
			if($multiple == TRUE)
			{
				$_FILES[$field_name]['name']		= $files[$field_name]['name'][$i];
				$_FILES[$field_name]['type']		= $files[$field_name]['type'][$i];
				$_FILES[$field_name]['tmp_name']	= $files[$field_name]['tmp_name'][$i];
				$_FILES[$field_name]['error']		= $files[$field_name]['error'][$i];
				$_FILES[$field_name]['size']		= $files[$field_name]['size'][$i]; 
			}
			else
			{
				$_FILES = $files;
			}
			
			if($_FILES[$field_name]['error'] === 0)
			{
				// initialize config for file
				$this->upload->initialize($config);
				
				// upload file -
				if($this->upload->do_upload($field_name))
				{
					// get uploaded file data -
					$file_info = $this->upload->data();
					
					// store file name in array -
					$file_name_array[] = $file_info['file_name'];
				}
				else
				{
					// get file upload error -
					$error =  $this->upload->display_errors();
					
					// srore error in array -
					$file_error_array[$files[$field_name]['name'][$i]] = $error;
				}
			}
		}
		
		// define array for response -
		$response = array();
		
		// file name array and file error array store in response array -
		$response[0] = $file_name_array;
		$response[1] = $file_error_array;
		
		// return response array -
		return $response;
	}
	
	// function to get current user id logged in -
	function get_user_id()
	{
		if(!$this->session->userdata('logged_in'))
		{
			return $this->session->userdata('intern_id');
		}
		else
		{
			return FALSE;
		}
	}
	

	
}