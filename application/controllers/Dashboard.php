<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('user_id')){
            return redirect( 'Login' );
        }
		$this->session->unset_userdata('socity_id');
		$this->session->unset_userdata('socity_name');
		$this->session->unset_userdata('year');
		$this->load->model("DashboardModel");
	}
	
	public function index()
	{	
		
		$getData['createSocietyBtn'] 	= $this->DashboardModel->getCreateSocietyBtn();
		
		$getData['society_details'] 	= $this->DashboardModel->getSocietyRecordModel();
		
		//$getData1['getddlFinancialYear'] = $this->DashboardModel->getddlFinancialYear();
		// echo "<pre>";
		// print_r($getData1);
		// echo "</pre>";
		$getData['SocietyDropDown'] 			= $this->DashboardModel->SocietyDropDown();
		
		$CreateSociety  		    = $this->DashboardModel->createSociety();
		
		echo "<pre>";
		print_r($CreateSociety);
		echo "</pre>";
		
		$this->load->view('dashboard_view',$getData);
		
				
	}
	
	
}
