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
		$data['added_by_user'] = $this->session->userdata('ngo_id');

        $this->db->insert($table, $data);
		
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
		$data['edited_by_user'] = $this->session->userdata('ngo_id');
			
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
}