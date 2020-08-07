<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pagenotfound extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		$this->load->library('session');
		$this->load->helper('url');
	}
	
	public function index()
	{
		$this->load->view('login/pagenotfound');
	}
}
