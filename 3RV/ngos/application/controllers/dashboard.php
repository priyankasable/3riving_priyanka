<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends MY_Controller
{
	function index()
	{			 
		 $data['rsnotice'] = $this->db->query("select * from tbl_cms where is_deleted='0'");
		 
		/* $subservice_query = $this->db->query("select * from tbl_sub_servicesale_master where is_deleted='0'");
		 $item_query = $this->db->query("select * from tbl_item_master where is_deleted='0'");
		 $user_query = $this->db->query("select * from tbl_users where is_deleted='0'");
		 $vendor_query = $this->db->query("select * from tbl_vendor where is_deleted='0' and is_active='Y'");
		 
		 /*---------------------------- Home Services Counts --------------------------*/
		 /*$homeservice_query = $this->db->query("select * from tbl_service_order_summary");
		 $pending_query = $this->db->query("select * from tbl_service_order_summary where flag = 'vendor_allocated'");
		 $completed_query = $this->db->query("select * from tbl_service_order_summary where flag = 'closed'");
		 $cancelled_query = $this->db->query("select * from tbl_service_order_summary where flag = 'cancelled'");

		 $todays_date = date('Y-m-d');
		 $todays_query = $this->db->query("select * from tbl_service_order_summary where DATE(date_added) = '$todays_date'"); */
		 
		 
		 /*--------------------------------- Seasonal Services Counts -----------------------*/
		/* $seasonal_query = $this->db->query("select * from tbl_seasonal_order_summary");
		 $sea_pending_query = $this->db->query("select * from tbl_seasonal_order_summary where flag = 'vendor_allocated'");
		 $sea_completed_query = $this->db->query("select * from tbl_seasonal_order_summary where flag = 'closed'");
		 $sea_cancelled_query = $this->db->query("select * from tbl_seasonal_order_summary where flag = 'cancelled'");

		 $sea_todays_query = $this->db->query("select * from tbl_seasonal_order_summary where DATE(date_added) = '$todays_date'");
		 
		 $data['servicecnt'] = $service_query->num_rows();
		 $data['subservicecnt'] = $subservice_query->num_rows();
		 $data['itemcnt'] = $item_query->num_rows();
		 $data['usercnt'] = $user_query->num_rows();
		 $data['vendorcnt'] = $vendor_query->num_rows();
		 $data['homeservicecnt'] = $homeservice_query->num_rows();
		 $data['pendingcnt'] = $pending_query->num_rows();
		 $data['completedcnt'] = $completed_query->num_rows();
		 $data['cancelledcnt'] = $cancelled_query->num_rows();
		 $data['todayshomecnt'] = $todays_query->num_rows(); */
		  
		 /*------------------  Seasonal Counts -------------------------*/ 
		/* $data['seaservicecnt'] = $seasonal_query->num_rows();
		 $data['seapendingcnt'] = $sea_pending_query->num_rows();
		 $data['seacompletedcnt'] = $sea_completed_query->num_rows();
		 $data['seacancelledcnt'] = $sea_cancelled_query->num_rows();
		 $data['seatodayshomecnt'] = $sea_todays_query->num_rows(); */
		 
		  
		 $this->load->view('dashboard/dashboard',$data);
	}
	
}
?>