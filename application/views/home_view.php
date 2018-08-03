<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('dashboard_header/header');
$this->load->view('dashboard_sidebar/sidebar');

$user_id 	= $this->session->userdata['user_id'];
$acc_id 	= $this->session->userdata['acc_id'];
$role 		= $this->session->userdata['role'];
$account_no = $this->session->userdata['account_no'];
$socity_name = $this->session->userdata['socity_name'];
$year = $this->session->userdata['year'];
?>

	<div class="row wrapper border-bottom white-bg">
		<div class="col-lg-6 col-md-4">
			<p style="font-size: 16px; font-weight: inherit; padding-top: 7px;">Society: <a href="<?=base_url("dashboard")?>"><span class="badge badge-info"><?=$socity_name?></span></a></p>
			
		</div>
		<div class="col-lg-4 col-md-4">
			<p style="font-size: 16px; font-weight: inherit; padding-top: 7px;">Financial Year: <span class="badge badge-info"><?=$year?></span></p>
		</div>		
	</div>
	
	<div class="row wrapper border-bottom white-bg">
		<div class="col-lg-2 col-md-4">
			<p style="font-size: 16px; font-weight: inherit; padding-top: 7px;">Home</p>
		</div>
		<div class="col-lg-10 col-md-8 text-right alignment">
			<ol class="breadcrumb" style="padding-top: 11px;">
				<li>
					<a href="#">Home</a>
				</li>
				<li>
					<a href="#">Society</a>
				</li>
				<li class="active">
					<strong>Society List</strong>
				</li>
			</ol>
		</div>
	</div>

<?php
	$this->load->view('dashboard_footer/footer');
	$this->load->view('dashboard_footer/common_javascript');
?>