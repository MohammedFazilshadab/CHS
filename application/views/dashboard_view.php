<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('dashboard_header/header');
$this->load->view('dashboard_sidebar/sidebar');

$user_id 	= $this->session->userdata['user_id'];
$acc_id 	= $this->session->userdata['acc_id'];
$role 		= $this->session->userdata['role'];
$account_no = $this->session->userdata['account_no'];
?>

	<div class="row wrapper border-bottom white-bg">
		<div class="col-lg-2 col-md-4">
			<p style="font-size: 16px; font-weight: inherit; padding-top: 7px;">Society List</p>
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
<div class="wrapper wrapper-content">
        <div class="row">
			<!--div class="col-lg-3">
				<div class="ibox float-e-margins">
					<div class="ibox-title">
						<span class="label label-success pull-right">Monthly</span>
						<h5>Income</h5>
					</div>
					<div class="ibox-content">
						<h1 class="no-margins">40 886,200</h1>
						<div class="stat-percent font-bold text-success">98% <i class="fa fa-bolt"></i></div>
						<small>Total income</small>
					</div>
				</div>
			</div>
			<div class="col-lg-3">
				<div class="ibox float-e-margins">
					<div class="ibox-title">
						<span class="label label-info pull-right">Annual</span>
						<h5>Orders</h5>
					</div>
					<div class="ibox-content">
						<h1 class="no-margins">275,800</h1>
						<div class="stat-percent font-bold text-info">20% <i class="fa fa-level-up"></i></div>
						<small>New orders</small>
					</div>
				</div>
			</div>
			<div class="col-lg-3">
				<div class="ibox float-e-margins">
					<div class="ibox-title">
						<span class="label label-primary pull-right">Today</span>
						<h5>visits</h5>
					</div>
					<div class="ibox-content">
						<h1 class="no-margins">106,120</h1>
						<div class="stat-percent font-bold text-navy">44% <i class="fa fa-level-up"></i></div>
						<small>New visits</small>
					</div>
				</div>
			</div>
			<div class="col-lg-3">
				<div class="ibox float-e-margins">
					<div class="ibox-title">
						<span class="label label-danger pull-right">Low value</span>
						<h5>User activity</h5>
					</div>
					<div class="ibox-content">
						<h1 class="no-margins">80,600</h1>
						<div class="stat-percent font-bold text-danger">38% <i class="fa fa-level-down"></i></div>
						<small>In first month</small>
					</div>
				</div>
            </div-->
			
			
			<div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Society List Table</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="#">Config option 1</a>
                                </li>
                                <li><a href="#">Config option 2</a>
                                </li>
                            </ul>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
					<div><?php echo $createSocietyBtn;?></div>
                    <div class="table-responsive">
							<table class="table table-striped table-bordered table-hover dataTables-example" >
							<thead>
							<tr>
								<th>Sr.No</th>
								<th>Society</th>
								<th>Society Aliase</th>						
								<th>Created Date</th>
								<th>Last Access</th>
								<th>Action</th>
							</tr>
							</thead>
							<tbody>
							<?php if($society_details > 0):?>
								<?php $i = 1;?>
								<?php 
								$check_validity = 0; 
								foreach($society_details as $key=>$item):
								$SocietyName = "'".$item->society_name."'";
								?>
									<tr id="tr_<?=$item->id?>">
										<td id="counter_id"><?=$i?></td>
										<td id="society_name_<?=$item->id?>">
										<?php
										if($role == 2){
											$queryWebAdmpayment = $this->db->select('validit_date')
													 ->from('web_admpayment')
													 ->order_by("id", "desc")
													 ->limit(1)
													 ->where('acc_no',$account_no)
													 ->get();
													 
												if ($queryWebAdmpayment->num_rows() > 0){
													$resultWebAdmpayment 	= $queryWebAdmpayment->result_array();
													$WebAdmpaymentValidDate	= $resultWebAdmpayment[0];
													$currentDate 			= date('Y-m-d');
													if($currentDate > $WebAdmpaymentValidDate['validit_date']){
													
														$queryOwnerNumber  = $this->db->select('user_id')
																				 ->from('tbl_user')
																				 ->where('account_no',$account_no)
																				 ->get();
														$resultOwnerNumber = $queryOwnerNumber->result_array();
														if($item->owner == $resultOwnerNumber['user_id']){
															if($check_validity != 0){
																$data = '<a onclick="validity_function()">'.$item->society_name.'</a>';
															}else{
																$data = '<a href="javascript:void(0)" onclick="ShowFinancialPopup('.$item->id.','.$SocietyName.')">'.$item->society_name.'</a>';
															}
															$check_validity = 1;
														}
													
													}else{
														$data  = '<a href="javascript:void(0)" onclick="ShowFinancialPopup('.$item->id.','.$SocietyName.')">'.$item->society_name.'</a>';
													}
												}else{
													$data  = '<a href="javascript:void(0)" onclick="ShowFinancialPopup('.$item->id.','.$SocietyName.')">'.$item->society_name.'</a>';
												} 				 
											}else{
												$data  = '<a href="javascript:void(0)" onclick="ShowFinancialPopup('.$item->id.','.$SocietyName.')">'.$item->society_name.'</a>';
											}
											echo $data;										
										?>										
										</td>
										<td id="page_name_<?=$item->id?>"><?=$item->society_aliase?></td>
										<td><?=$item->create_date?></td>
										<td><?=$item->last_access?></td>
										<td><button class="btn btn-info btn-xs" type="button" data-toggle="modal" data-target="#myModal" onclick="EditSocietyRecord(<?=$item->id?>)"><i class="fa fa-paste"></i> Edit</button></td>
									</tr>
								<?php $i++; endforeach;?>
							<?php endif?>
							</tbody>
							<tfoot>
							<tr>
								<th>Sr.No</th>
								<th>Society</th>
								<th>Page Name</th>
								<th>Created Date</th>
								<th>Last Access</th>
								<th>Action</th>
							</tr>
							</tfoot>
							</table>
                        </div>
						<!--Edit Category record -->
						<div class="modal inmodal" id="myModal" tabindex="-1" role="dialog" aria-hidden="true"  data-keyboard="false" data-backdrop="static">
                                <div class="modal-dialog">
                                <div class="modal-content animated bounceInRight">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            <!--i class="fa fa-laptop modal-icon"></i-->
                                            <h4 class="modal-title">Edit Society</h4>
                                            <!--small class="font-bold">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</small-->
                                        </div>
										<div id="Msg"></div>
                                        <div class="modal-body">
										<form name="modal-form-test" id="EditSocietyForm" name="EditSocietyForm" method="POST">
											<input type="hidden" name="hdnEditSociety_id" id="hdnEditSociety_id" />
											<div class="form-group">
												<label>Society Name</label> 
												<input type="text" name="txtEditSocietyName" id="txtEditSocietyName" placeholder="Enter your Society Name" class="form-control">
											</div>
											<div class="form-group">
												<label>Short Name/Aliase</label> 
												<input type="text" name="txtEditShortName" id="txtEditShortName"   placeholder="Enter your Short Name" class="form-control">
											</div>
											<div class="form-group">
												<label>Society Type</label> 
													<select name="type" id="ddlEditSocietyType" class="form-control">
														<option value="">Select Type</option>
														
													</select>
											</div>
											</form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary" id="btnSaveSociety">Save Society</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
							<!-- Create New Society Model popup -->
							<div class="modal inmodal" id="myModalCreateSociety" tabindex="-1" role="dialog" aria-hidden="true"  data-keyboard="false" data-backdrop="static">
                                <div class="modal-dialog">
                                <div class="modal-content animated bounceInRight">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            <!--i class="fa fa-laptop modal-icon"></i-->
                                            <h4 class="modal-title">Create New Society</h4>
                                        </div>
                                        <div class="modal-body">
										<form name="modal-form-test" id="modal-form-society" method="POST">
												<input type="hidden" name="hdnSociety_id" id="hdnSociety_id" />
												<div class="form-group">
													<label>Society Name</label> 
													<input type="text" name="txtSocietyName" id="txtSocietyName" placeholder="Enter your Society Name" class="form-control">
												</div>
												<div class="form-group">
													<label>Short Name/Aliase</label> 
													<input type="text"  name="txtShortName" id="txtShortName"  placeholder="Enter your Short Name" class="form-control">
												</div>
												<div class="form-group">
													<label>Society Type</label> 
													<?php 
													echo form_dropdown('ddlSocietyType', $SocietyDropDown,'',["class"=>"form-control"]);
													?>
														<!--select name="type" id="ddlSocietyType" class="form-control">
															<option value="">Select Type</option>
																													
														</select-->
												</div>
											</form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
							<!--Select Financial Year -->
							<div class="modal inmodal" id="myModalFinancialYear" tabindex="-1" role="dialog" aria-hidden="true"  data-keyboard="false" data-backdrop="static">
                                <div class="modal-dialog">
                                <div class="modal-content animated bounceInRight">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            <!--i class="fa fa-laptop modal-icon"></i-->
                                            <h4 class="modal-title">Select Financial Year</h4>
                                        </div>
                                        <div class="modal-body">
											<form name="modal-form-test" id="set-financial-year" name="set-financial-year" method="POST">
												<input type="hidden" name="sname" id="sname" value="" />
												<input type="hidden" name="sid" id="sid" value="" />
																								
												<div class="form-group">
													<label>Society Type</label> 
														<select id="ddlFinancialYear" name="ddlFinancialYear" class="form-control">
															<option value="">Select Type</option>															
														</select>
												</div>
											</form>
                                        </div>
                                        <div class="modal-footer">                                            
                                            <button type="button" class="btn btn-primary" id="SetFinancialYear" style="margin-bottom: 0px !important;">GO</button>
											<button type="button" class="btn btn-primary">Create Fiscal Year</button>
											<button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
							
						</div>
					</div>
				</div>
			</div>        	
		</div>
	<?php
		$this->load->view('dashboard_footer/footer');
		$this->load->view('dashboard_footer/common_javascript');
	?>
	<script src="<?=base_url('assets/js/plugins/dataTables/datatables.min.js')?>"></script>
	<!-- Page-Level Scripts -->
    <script>
        $(document).ready(function(){
            $('.dataTables-example').DataTable({
                pageLength: 25,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    { extend: 'copy'},
                    {extend: 'csv'},
                    {extend: 'excel', title: 'ExampleFile'},
                    {extend: 'pdf', title: 'ExampleFile'},

                    {extend: 'print',
                     customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                    }
                    }
                ]

            });
			
			$("#Logout").click(function()
			{
				try 
				{
					$.ajax({
						url: "<?=base_url("/AjaxController/AjaxMethod/Logout")?>",
						type: "POST",
						dataType: 'JSON',
						success: function(response) {
							if (response.result.success) {
								window.location = response.result.redirect;
							}
						}
					});
				}
				catch(err){
				   console.log(err);
				}	
			});
						
			$("#SetFinancialYear").click(function() 
			{
				try 
				{
					var data = $("#set-financial-year").serialize();
					$.ajax({
						url: "<?=base_url("/AjaxController/AjaxMethod/SetFinancialYear")?>",
						data: data,
						type: "POST",
						dataType: 'JSON',
						success: function(response) {
							if (response.result.success) {
								window.location = response.result.redirect;
							} 
						}
					});
				}
				catch(err){
				   console.log(err);
				}				
			});
			
			$("#btnSaveSociety").click(function()
			{
				try 
				{
					var data = $("#EditSocietyForm").serialize();
					var Society_id = '';
					var SocietyName = '';
					var SocietyAliase = '';
					var Type = '';
					var Msg = '';
					$.ajax({
						url: "<?=base_url("/AjaxController/AjaxMethod/UpdateSocietyList")?>",
						data: data,
						type: "POST",
						dataType: 'JSON',
						success: function(response) {
							if (response.result.success) {
								Society_id 		= response.result.Data['id'];
								SocietyName 	= response.result.Data['society_name'];
								SocietyAliase 	= response.result.Data['society_aliase'];
								Type 			= response.result.Data['types'];
								Msg = '<div class="alert alert-success">'+ response.result.Message +'</div>';
								$("#Msg").html(Msg);
								$("#tr_"+Society_id).find("#society_name_"+Society_id).find("a").text(SocietyName);
								$("#tr_"+Society_id).find("#page_name_"+Society_id).text(SocietyAliase);
								
								setTimeout( function(){$("#myModal").modal('hide');} , 4000);
							} 
						}
					});
				}
				catch(err){
				   console.log(err);
				}		
			});
			
			
        });
		
		function expiredaccount() {
            alert("Your professional subscription has expired. please renew you account to add more society.");
            return false;
        }

        function CreateAlert() {
            alert("Your can't create more than 1 society.<br>For Create more society you have upgrade your plan.");
            return false;
        }

        function validity_function() {
            alert("Your Professional Account Expired.");
            return false;
        }
		
		function ShowFinancialPopup(sid,societyName)
		{
			try {
					if(sid !='' && sid != null){
						$.ajax({
							url: "<?=base_url("/AjaxController/AjaxMethod/GetFinancialYearDropdown")?>",
							data: {"SocietyID":sid},
							type: "POST",
							dataType: 'JSON',
							success: function(response) {
								if (response.result.success) {
									$("#ddlFinancialYear").html(response.result.Data);
									$("#sid").val(sid);
									$("#sname").val(societyName);
									$("#myModalFinancialYear").modal('show');
								}
							}
						});
					}else{
						return false;
					}
				}
				catch(err) {
				   console.log(err);
				}			
		}
		
		function SetFinancialYear(){
			try {
				
			}
			catch(err) {
			   console.log(err);
			}	
		}
		
		function EditSocietyRecord(recordID)
		{
			try 
			{
				$("#txtEditSocietyName").val('');
				$("#txtEditShortName").val('');
				$("#ddlEditSocietyType").val('');
				var SocietyName = '';
				var SocietyAliase = '';
				var Type = '';
				$("#Msg").html('');
				$.ajax({
					url: "<?=base_url("/AjaxController/AjaxMethod/EditSocietyList")?>",
					data: {"SocietyID":recordID},
					type: "POST",
					dataType: 'JSON',
					success: function(response) 
					{
						if (response.result.success) 
						{
							SocietyName 	= response.result.Data.societyRecord['society_name'];
							SocietyAliase 	= response.result.Data.societyRecord['society_aliase'];
							Type 			= response.result.Data.societyRecord['types'];
							$("#txtEditSocietyName").val(SocietyName);
							$("#txtEditShortName").val(SocietyAliase);
							$("#ddlEditSocietyType").val(Type);
							$("#ddlEditSocietyType").html(response.result.Data.societyddlType);
							$("#hdnEditSociety_id").val(recordID);
						}
					}
				});
			}
			catch(err){
			   console.log(err);
			}			
		}

		</script>
	</body>
</html>