<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AjaxController extends CI_Controller {
	
	
	public function __construct()
	{
		parent::__construct();
	}	

	public function AjaxMethod($case)
	{
		switch($case){
			case "Login":	
					$json = array();			
					$username = $this->input->post('Email');
					$password = $this->input->post('Password');
					$this->load->model( 'loginmodel' );
					$loginDetails  = $this->loginmodel->validate_login($username,$password);
					//print_r($loginDetails);
					$userAccountNo = $loginDetails['account_no'];
					$roleName	   = $loginDetails['role_name'];
					if(!empty($loginDetails)){
						$this->load->library('session');															
						$this->session->set_userdata(array(
							'user_id'		=> $loginDetails['user_id'],
							'first_name'    => $loginDetails['first_name'],
							'email'         => $loginDetails['email'],
							'role'			=> $loginDetails['role_id'],
							'role_name'		=> $loginDetails['role_name'],
							'role_priority'	=> $loginDetails['priority'],
							'society_id'	=> $loginDetails['society_id'],
							'account_no'	=> $loginDetails['account_no']
						));
						
						$societyDetails = $this->loginmodel->getSocietyDetails($userAccountNo);	
						if($roleName == "Member"){							
							$this->session->set_userdata(array(
							'socity_id'		=> $societyDetails["socity_id"],
							'society_name'  => $societyDetails["society_name"]							
							));
						}else{
							$this->session->set_userdata(array(
							'acc_id'		=> $societyDetails["acc_id"]												
							));
						}
						
						$json['result'] = array("success"=>true, "Message"=>"Success login", "redirect"=>"Dashboard");
					}else{
						$json['result'] = array("success"=>false, "Message"=>"Please enter correct creadential");
					}
					echo json_encode($json);			
					break;
			case "Logout":
					$this->session->unset_userdata('user_id');
					$this->session->sess_destroy();
					$json['result'] = array("success"=>true, "Message"=>"Logout Successfully..!", "redirect"=>"Login");
					echo json_encode($json);
					break;
					
			case "Registration":
				echo "Your are in registration!";
				break;
				
			case "CreateSociety":
					$data['txtEditSocietyName'] = $this->input->post('txtEditSocietyName');
					$data['txtEditShortName'] 	= $this->input->post('txtEditShortName');
					$data['ddlEditSocietyType'] = $this->input->post('ddlEditSocietyType');
					$this->load->model( 'DashboardModel' );
					$CreateSociety  		    = $this->DashboardModel->createSociety($data);
					
			case "EditSocietyList":	
			
					$SocietyID = $this->input->post('SocietyID');
					$this->load->model( 'DashboardModel' );
					$SocietyDetails['societyRecord']  = $this->DashboardModel->getSocietyDetails($SocietyID);
					$SocietyDetails['societyddlType'] = $this->DashboardModel->getddlSocietyType();
					$json['result'] = array("success"=>true, "Message"=>"Result found..!", "Data"=>$SocietyDetails);
					echo json_encode($json);
					break;
					
			case "UpdateSocietyList":
			
					$data['Society_id']			= $this->input->post('hdnEditSociety_id');
					$data['txtEditSocietyName'] = $this->input->post('txtEditSocietyName');
					$data['txtEditShortName'] 	= $this->input->post('txtEditShortName');
					$data['ddlEditSocietyType'] = $this->input->post('ddlEditSocietyType');
					$this->load->model( 'DashboardModel' );
					$UpdateSocietyDetails  		= $this->DashboardModel->updateSocietyDetails($data);
					
					if($UpdateSocietyDetails){
						$json['result'] = array("success"=>true, "Message"=>"Society updated Successfully..!", "Data"=>$UpdateSocietyDetails);
					}else{
						$json['result'] = array("success"=>false, "Message"=>"Society not updated..!");
					}
					echo json_encode($json);
					break;
					
			case "GetFinancialYearDropdown":
			
					$SocietyID = $this->input->post('SocietyID');
					$this->load->model( 'DashboardModel' );
					$FinancialYearDropdown  = $this->DashboardModel->getddlFinancialYear($SocietyID);
					$json['result'] = array("success"=>true, "Message"=>"Result found..!", "Data"=>$FinancialYearDropdown);
					echo json_encode($json);
					break;
					
			case "SetFinancialYear":
			
					$data['socity_id'] 	 = $this->input->post('sid');
					$data['socity_name'] = $this->input->post('sname');
					$data['year']		 = $this->input->post('ddlFinancialYear');
					$this->session->set_userdata($data);
					$json['result'] = array("success"=>true, "Message"=>"Result found..!", "redirect"=>"Home");
					echo json_encode($json);
					break;
			default:
				echo "Something went wrong..!";
		}
		
	}
}
