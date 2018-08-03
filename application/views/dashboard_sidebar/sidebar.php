<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$user_id 		= $this->session->userdata['user_id'];
$acc_id 		= $this->session->userdata['acc_id'];
$role 			= $this->session->userdata['role'];
$role_priority 	= $this->session->userdata['role_priority'];
//$socity_id 		= $this->session->userdata['socity_id'];
?>
<nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element"> 
						<span>
							<img alt="image" class="img-circle" width="52px" src="<?=base_url('assets/img/user.png')?>" />
                        </span>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?=$this->session->userdata('first_name');?></strong>
                             </span> <span class="text-muted text-xs block"><?=$this->session->userdata('role_name');?><b class="caret"></b></span> </span> </a>
							<ul class="dropdown-menu animated fadeInRight m-t-xs">
								<li><a href="profile.html">Profile</a></li>
								<li><a href="contacts.html">Contacts</a></li>
								<li><a href="mailbox.html">Mailbox</a></li>
								<li class="divider"></li>
								<li><a href="#">Logout</a></li>
							</ul>
                    </div>
                    <div class="logo-element">
                        CHS
                    </div>
                </li>
				<?php if(isset($this->session->userdata['socity_id']) OR $role == 1):?>
				<li>
					<a href="dashboard.php?page=home">
						<i class="fa fa-dashboard"></i> <span class="nav-label">Dashboards</span>
					</a>
					
				</li>
					<?php if($this->zacl->check_acl($role, null, 'society.read')):?>
					<li class="">
							<a href="#"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Society</span><span class="fa arrow"></span></a>
							<ul class="nav nav-second-level collapse" style="height: 0px;">
							
								<?php if($this->zacl->check_acl($role, null, 'society-list.read')):?>
									<li class="active"><a href="#">Society List</a></li>
								<?php endif;?>
								
								<?php if($this->zacl->check_acl($role, null, 'society-profile.read')):?>
									<li><a href="#">Society Profile</a></li>
								<?php endif;?>
								
								<?php if($this->zacl->check_acl($role, null, 'wingsblocks.read')):?>
									<li><a href="#">Wings &amp; Blocks</a></li>
								<?php endif;?>
								
								<?php if($this->zacl->check_acl($role, null, 'unitsflat-detail.read')):?>
									<li><a href="#">Flat Details</a></li>
								<?php endif;?>
								
								<?php if($this->zacl->check_acl($role, null, 'owner-profile.read')):?>
									<li><a href="#">Owner's Profile</a></li>
								<?php endif;?>
								
							</ul>
					</li>
					<?php endif;?>
				<?php endif;?>
				
				<?php if(isset($this->session->userdata['socity_id'])):?>
					<?php if($this->zacl->check_acl($role, null, 'billing.read')):?>
						<li class="">
							<a href="index.html"><i class="fa fa-laptop"></i> <span class="nav-label">Billing</span> <span class="fa arrow"></span></a>
							<ul class="nav nav-second-level">
							
								<?php if($this->zacl->check_acl($role, null, 'opening-balance-members.read')):?>
									<li><a href="#">Opening Balance- Member</a></li>
								<?php endif;?>
								
								<?php if($this->zacl->check_acl($role, null, 'create-bill-charges.read')):?>
									<li><a href="#">Charge List</a></li>
								<?php endif;?>
								
								<?php if($this->zacl->check_acl($role, null, 'member-charge-allocation.read')):?>
									<li><a href="#">Allocate Charges</a></li>
								<?php endif;?>
								
								<?php if($this->zacl->check_acl($role, null, 'bill-posting.read')):?>
									<li><a href="#">Bill Posting Date</a></li>
								<?php endif;?>
								
								<?php if($this->zacl->check_acl($role, null, 'bill-messages.read')):?>
									<li><a href="#">Messages</a></li>
								<?php endif;?>
								
								<?php if($this->zacl->check_acl($role, null, 'interestpenalty-setting.read')):?>
									<li><a href="#">Interest/Penalty Setting</a></li>
								<?php endif;?>
								
								<?php if($this->zacl->check_acl($role, null, 'generate-bills.read')):?>
									<li><a href="#">Bill Generation</a></li>								
									<li><a href="#">Single Bill Generation</a></li>		
								<?php endif;?>	
							</ul>
						</li>
					<?php endif;?>
				
				
				<?php if($this->zacl->check_acl($role, null, 'accounting.read')):?>
				<li class="">
                    <a href="index.html"><i class="fa fa-edit"></i> <span class="nav-label">Accounting</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
					
						<?php if($this->zacl->check_acl($role, null, 'reciept.read')):?>
							<li><a href="#">Receipts</a></li>
						<?php endif;?>
						
						<?php if($this->zacl->check_acl($role, null, 'payments.read')):?>
							<li><a href="#">Payments</a></li>
							<li><a href="#">Multi Payments</a></li>
						<?php endif;?>
						
						<?php if($this->zacl->check_acl($role, null, 'journals.read')):?>
							<li><a href="#">Journal</a></li>
						<?php endif;?>
						
						<?php if($this->zacl->check_acl($role, null, 'contra.read')):?>
							<li><a href="#">Contra</a></li>
						<?php endif;?>
						
						<?php if($this->zacl->check_acl($role, null, 'debit-note.read')):?>
							<li><a href="#">Debit Note</a></li>
						<?php endif;?>
						
						<?php if($this->zacl->check_acl($role, null, 'credit-note.read')):?>
							<li><a href="#">Credit Note</a></li>
						<?php endif;?>
						
						<?php if($this->zacl->check_acl($role, null, 'bank-reconciliation.read')):?>
							<li><a href="#">Bank Reconcilation</a></li>
						<?php endif;?>
						
						<?php if($this->zacl->check_acl($role, null, 'groups.read')):?>
							<li><a href="#">Groups</a></li>
						<?php endif;?>
						
						<?php if($this->zacl->check_acl($role, null, 'ledger.read')):?>
							<li><a href="#">Ledgers</a></li>
						<?php endif;?>												
                    </ul>
                </li>
				<?php endif;?>
				
				<?php if($this->zacl->check_acl($role, null, 'management.read')):?>
				<li class="">
                    <a href="index.html"><i class="fa fa-table"></i> <span class="nav-label">Management</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
					
						<?php if($this->zacl->check_acl($role, null, 'membership.read')):?>
							<li><a href="#">Membership</a></li>
						<?php endif;?>
						
						<?php if($this->zacl->check_acl($role, null, 'share.read')):?>
							<li><a href="#">Share</a></li>
						<?php endif;?>
						
						<?php if($this->zacl->check_acl($role, null, 'nominations.read')):?>
							<li><a href="#">Nomination</a></li>
						<?php endif;?>
						
						<?php if($this->zacl->check_acl($role, null, 'parking.read')):?>
							<li><a href="#">parking</a></li>
						<?php endif;?>
						
						<?php if($this->zacl->check_acl($role, null, 'tenant.read')):?>
							<li><a href="#">Tenant</a></li>
						<?php endif;?>
						
						<?php if($this->zacl->check_acl($role, null, 'move-inout.read')):?>
							<li><a href="#">Move In/Out</a></li>
						<?php endif;?>
						
						<?php if($this->zacl->check_acl($role, null, 'loan-line.read')):?>
							<li><a href="#">Loan &amp; Lien</a></li>
						<?php endif;?>
						
						<?php if($this->zacl->check_acl($role, null, 'caretakerpoa.read')):?>
							<li><a href="#">Caretaker/POA</a></li>	
						<?php endif;?>	
                    </ul>
                </li>
				<?php endif;?>
				
				<?php if($this->zacl->check_acl($role, null, 'administration.read')):?>
				<li class="">
                    <a href="index.html"><i class="fa fa-folder"></i> <span class="nav-label">Administration</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
					
						<?php if($this->zacl->check_acl($role, null, 'managing-committee.read')):?>
							<li><a href="#">Managing Committee</a></li>
						<?php endif;?>
						
						<?php if($this->zacl->check_acl($role, null, 'notice-meetings.read')):?>
							<li><a href="#">Notice & Meeting</a></li>
						<?php endif;?>
						
						<?php if($this->zacl->check_acl($role, null, 'assets-investments.read')):?>
							<li><a href="#">Assets & Investments</a></li>
						<?php endif;?>
						
						<?php if($this->zacl->check_acl($role, null, 'service-provider.read')):?>
							<li><a href="#">Service Provider</a></li>
						<?php endif;?>
						
						<?php if($this->zacl->check_acl($role, null, 'staff-management.read')):?>
							<li><a href="#">Staff Manager</a></li>
						<?php endif;?>
						
						<?php if($this->zacl->check_acl($role, null, 'visitor-movement.read')):?>
							<li><a href="#">Visitor Movement</a></li>
						<?php endif;?>
						
						<?php if($this->zacl->check_acl($role, null, 'facility-booking.read')):?>
							<li><a href="#">Facility Booking</a></li>
						<?php endif;?>
						
						<?php if($this->zacl->check_acl($role, null, 'election-management.read')):?>
							<li><a href="#">Election Management</a></li>
						<?php endif;?>
						
						<?php if($this->zacl->check_acl($role, null, 'service-directory.read')):?>
							<li><a href="#">Service Directory</a></li>	
						<?php endif;?>	
                    </ul>
                </li>
				<?php endif;?>
				
				<?php if($this->zacl->check_acl($role, null, 'administration.read')):?>
				<li class="">
						<a href="index.html"><i class="fa fa-calendar"></i> <span class="nav-label">Reports</span> <span class="fa arrow"></span></a>
						<ul class="nav nav-second-level">
							
							<?php if($this->zacl->check_acl($role, null, 'opening-balance.read')):?>
								<li><a href="#">Opening Balance</a></li>
							<?php endif;?>
							
							<?php if($this->zacl->check_acl($role, null, 'receipt-register.read')):?>	
								<li><a href="#">Receipt Register</a></li>
							<?php endif;?>
							
							<?php if($this->zacl->check_acl($role, null, 'bill-register.read')):?>
								<li><a href="#">Bill Print</a></li>
							<?php endif;?>
							
							<?php if($this->zacl->check_acl($role, null, 'bill-register.read')):?>	
								<li><a href="#">Bill Register</a></li>
							<?php endif;?>
							
							<?php if($this->zacl->check_acl($role, null, 'members-outstanding.read')):?>	
								<li><a href="#">Charge Register</a></li>							
								<li><a href="#">Members Outstanding</a></li>							
								<li><a href="#">Members Outstanding (Additional)</a></li>
							<?php endif;?>
							
							<?php if($this->zacl->check_acl($role, null, 'bill-register.read')):?>
								<li><a href="#">Member Charge View</a></li>
							<?php endif;?>
							
							<?php if($this->zacl->check_acl($role, null, 'account-ledger.read')):?>
								<li><a href="#">Account Ledger</a></li>
							<?php endif;?>
							
							<?php if($this->zacl->check_acl($role, null, 'receipt-payments-report.read')):?>
								<li><a href="#">Receipt & Payment</a></li>
							<?php endif;?>
							
							<?php if($this->zacl->check_acl($role, null, 'trial-balance.read')):?>		
								<li><a href="#">Trial Balance</a></li>
							<?php endif;?>
							
							<?php if($this->zacl->check_acl($role, null, 'income-expenditure.read')):?>		
								<li><a href="#">Income & Expenditure</a></li>	
							<?php endif;?>
							
							<?php if($this->zacl->check_acl($role, null, 'balance-sheet.read')):?>	
								<li><a href="#">Balance Sheet</a></li>
							<?php endif;?>
							
							<?php if($this->zacl->check_acl($role, null, 'miscellenous-reports.read')):?>	
								<li><a href="#">Miscellenous Reports</a></li>		
							<?php endif;?>		
						</ul>
                </li>
				<?php endif;?>
				
				<?php if($this->zacl->check_acl($role, null, 'settings.read')):?>
					<li class="">
						<a href="index.html"><i class="fa fa-envelope"></i> <span class="nav-label">Settings</span> <span class="fa arrow"></span></a>
						<ul class="nav nav-second-level">
						
							<?php if($this->zacl->check_acl($role, null, 'financial-year.read')):?>
								<li><a href="#">Financial Year</a></li>
							<?php endif;?>
							
							<?php if($this->zacl->check_acl($role, null, 'accounts-setup.read')):?>
								<li><a href="#">Accounts Setup</a></li>
							<?php endif;?>
							
							<?php if($this->zacl->check_acl($role, null, 'auditor-information.read')):?>
								<li><a href="#">Auditor Information</a></li>
							<?php endif;?>
							
							<?php if($this->zacl->check_acl($role, null, 'service-tax.read')):?>
								<li><a href="#">GST Settings</a></li>
							<?php endif;?>
							
							<?php if($this->zacl->check_acl($role, null, 'member-bank.read')):?>
								<li><a href="#">Member Bank</a></li>
							<?php endif;?>
							
							<?php if($this->zacl->check_acl($role, null, 'year-end-closing.read')):?>
								<li><a href="#">Year End Closing</a></li>
							<?php endif;?>		
						</ul>
					</li>
				<?php endif;?>
				
				<?php if($this->zacl->check_acl($role, null, 'account.read')):?>
					<li class="">
						<a href="index.html"><i class="fa fa-envelope"></i> <span class="nav-label">User's Control</span> <span class="fa arrow"></span></a>
						<ul class="nav nav-second-level">
							<li><a href="#">Users Detail</a></li>
							
							<?php if($this->zacl->check_acl($role, null, 'roles.read')):?>
								<li><a href="#">Roles</a></li>
							<?php endif;?>
							
							<?php if($this->zacl->check_acl($role, null, 'permissions-allocation.read')):?>
								<li><a href="#">Permissions</a></li>
							<?php endif;?>		
						</ul>
					</li>
				<?php endif;?>	
				<?php endif;?>
            </ul>

        </div>
    </nav>
	<div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
        <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
            <form role="search" class="navbar-form-custom" action="search_results.html">
                <div class="form-group">
                    <input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">
					
                </div>
            </form>
        </div>
            <ul class="nav navbar-top-links navbar-right">
                <li>
                    <span class="m-r-sm text-muted welcome-message">Welcome to Corportate Housing Society.</span>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope"></i>  <span class="label label-warning">16</span>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        <li>
                            <div class="dropdown-messages-box">
                                <a href="profile.html" class="pull-left">
                                    <img alt="image" class="img-circle" src="img/a7.jpg">
                                </a>
                                <div>
                                    <small class="pull-right">46h ago</small>
                                    <strong>Mike Loreipsum</strong> started following <strong>Monica Smith</strong>. <br>
                                    <small class="text-muted">3 days ago at 7:58 pm - 10.06.2014</small>
                                </div>
                            </div>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="dropdown-messages-box">
                                <a href="profile.html" class="pull-left">
                                    <img alt="image" class="img-circle" src="img/a4.jpg">
                                </a>
                                <div>
                                    <small class="pull-right text-navy">5h ago</small>
                                    <strong>Chris Johnatan Overtunk</strong> started following <strong>Monica Smith</strong>. <br>
                                    <small class="text-muted">Yesterday 1:21 pm - 11.06.2014</small>
                                </div>
                            </div>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="dropdown-messages-box">
                                <a href="profile.html" class="pull-left">
                                    <img alt="image" class="img-circle" src="img/profile.jpg">
                                </a>
                                <div>
                                    <small class="pull-right">23h ago</small>
                                    <strong>Monica Smith</strong> love <strong>Kim Smith</strong>. <br>
                                    <small class="text-muted">2 days ago at 2:30 am - 11.06.2014</small>
                                </div>
                            </div>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="text-center link-block">
                                <a href="mailbox.html">
                                    <i class="fa fa-envelope"></i> <strong>Read All Messages</strong>
                                </a>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell"></i>  <span class="label label-primary">8</span>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="mailbox.html">
                                <div>
                                    <i class="fa fa-envelope fa-fw"></i> You have 16 messages
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="profile.html">
                                <div>
                                    <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                    <span class="pull-right text-muted small">12 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="grid_options.html">
                                <div>
                                    <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="text-center link-block">
                                <a href="notifications.html">
                                    <strong>See All Alerts</strong>
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </div>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0)" id="Logout"><i class="fa fa-sign-out"></i> Logout</a>
                </li>
                <li>
                    <a class="right-sidebar-toggle">
                        <i class="fa fa-tasks"></i>
                    </a>
                </li>
            </ul>
        </nav>
        </div>