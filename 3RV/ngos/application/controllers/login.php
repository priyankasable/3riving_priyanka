<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->helper('message');
	}
	
	public function index()
	{
		$this->load->view('login/login');
	}
	
	function validate_login()
	{
		$username = $this->input->post('login_username');
		$password = $this->input->post('login_password');
		
		$query = $this->db->query("select * from tbl_ngo where email='$username' and password='$password'");
		
		if($query->num_rows()==1)
		{
			$row = $query->row();
			$session_data = array('ngo_id'=> $row->id,
							      'ngo_logged_in' => TRUE);
			$this->session->set_userdata($session_data);
			
		    redirect(base_url().'index.php/dashboard');
		}
		else
		{
			$this->session->set_flashdata('message', array('title' => 'Error', 'content' =>'Invalid Username or Password', 'type' => 'e' ));
			
			redirect(base_url().'index.php/login');
		}
	} 
	
	function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url().'index.php/login');
	}
}
