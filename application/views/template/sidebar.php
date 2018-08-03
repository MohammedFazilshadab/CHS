<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
     <!-- Sidebar -->
  <body class="px-navbar-fixed">
  <nav class="px-nav px-nav-fixed">
    <button type="button" class="px-nav-toggle" data-toggle="px-nav">
      <span class="px-nav-toggle-arrow"></span>
      <span class="navbar-toggle-icon"></span>
      <span class="px-nav-toggle-label font-size-11">HIDE MENU</span>
    </button>

    <ul class="px-nav-content">
      <li class="px-nav-box p-a-3 b-b-1" id="demo-px-nav-box">
        <button type="button" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <img src="assets/demo/avatars/1.jpg" alt="" class="pull-xs-left m-r-2 border-round" style="width: 54px; height: 54px;">
        <div class="font-size-16"><span class="font-weight-light">Welcome, </span><strong>John</strong></div>
        <div class="btn-group" style="margin-top: 4px;">
          <a href="#" class="btn btn-xs btn-primary btn-outline"><i class="fa fa-envelope"></i></a>
          <a href="#" class="btn btn-xs btn-primary btn-outline"><i class="fa fa-user"></i></a>
          <a href="#" class="btn btn-xs btn-primary btn-outline"><i class="fa fa-cog"></i></a>
          <a href="#" class="btn btn-xs btn-danger btn-outline"><i class="fa fa-power-off"></i></a>
        </div>
      </li>

      <li class="px-nav-item px-nav-dropdown">
        <a href="#"><i class="px-nav-icon ion-ios-pulse-strong"></i><span class="px-nav-label">Dashboards<span class="label label-danger">5</span></span></a>
      </li>
      <li class="px-nav-item px-nav-dropdown">
        <a href="#"><i class="px-nav-icon ion-erlenmeyer-flask"></i><span class="px-nav-label">Society Info</span></a>

        <ul class="px-nav-dropdown-menu">
          <li class="px-nav-item"><a href="widgets-lists.html"><span class="px-nav-label">Society Listing</span></a></li>
          <li class="px-nav-item"><a href="widgets-pricing.html"><span class="px-nav-label">Society Profile</span></a></li>
          <li class="px-nav-item"><a href="widgets-timeline.html"><span class="px-nav-label">Wing & Blocks</span></a></li>
          <li class="px-nav-item"><a href="widgets-misc.html"><span class="px-nav-label">Flat Unit Details</span></a></li>
		            <li class="px-nav-item"><a href="widgets-misc.html"><span class="px-nav-label">Owner's Profile</span></a></li>

        </ul>
      </li>
      <li class="px-nav-item px-nav-dropdown">
        <a href="#"><i class="px-nav-icon ion-monitor"></i><span class="px-nav-label">Recurring Billing</span></a>

        <ul class="px-nav-dropdown-menu">
          <li class="px-nav-item"><a href="ui-buttons.html"><span class="px-nav-label">Member's Opening</span></a></li>
          <li class="px-nav-item"><a href="ui-tabs.html"><span class="px-nav-label">Charge List</span></a></li>
          <li class="px-nav-item"><a href="ui-modals.html"><span class="px-nav-label">Allocate Charges</span></a></li>
          <li class="px-nav-item"><a href="ui-alerts.html"><span class="px-nav-label">Bill Posting</span></a></li>
          <li class="px-nav-item"><a href="ui-panels.html"><span class="px-nav-label">Interest Settings</span></a></li>
          <li class="px-nav-item"><a href="ui-sortable.html"><span class="px-nav-label">Recurring Bill Generation</span></a></li>
        </ul>
      </li>
      <li class="px-nav-item px-nav-dropdown">
        <a href="#"><i class="px-nav-icon ion-android-checkbox-outline"></i><span class="px-nav-label">Accounting</span></a>

        <ul class="px-nav-dropdown-menu">
          <li class="px-nav-item"><a href="forms-layout.html"><span class="px-nav-label">Layout</span></a></li>
          <li class="px-nav-item"><a href="forms-controls.html"><span class="px-nav-label">Controls</span></a></li>
          <li class="px-nav-item"><a href="forms-components.html"><span class="px-nav-label">Components</span></a></li>
          <li class="px-nav-item"><a href="forms-advanced.html"><span class="px-nav-label">Advanced</span></a></li>
          <li class="px-nav-item"><a href="forms-sliders.html"><span class="px-nav-label">Sliders</span></a></li>
          <li class="px-nav-item"><a href="forms-pickers.html"><span class="px-nav-label">Pickers</span></a></li>
          <li class="px-nav-item"><a href="forms-editors.html"><span class="px-nav-label">Editors</span></a></li>
          <li class="px-nav-item"><a href="forms-validation.html"><span class="px-nav-label">Validation</span></a></li>
        </ul>
      </li>
      <li class="px-nav-item px-nav-dropdown">
        <a href="#"><i class="px-nav-icon ion-ios-keypad"></i><span class="px-nav-label">Management</span></a>

        <ul class="px-nav-dropdown-menu">
          <li class="px-nav-item"><a href="tables-bootstrap.html"><span class="px-nav-label">Bootstrap</span></a></li>
          <li class="px-nav-item"><a href="tables-datatables.html"><span class="px-nav-label">DataTables</span></a></li>
          <li class="px-nav-item"><a href="tables-editable-table.html"><span class="px-nav-label">editableTableWidget</span></a></li>
        </ul>
      </li>
      <li class="px-nav-item px-nav-dropdown">
        <a href="#"><i class="px-nav-icon ion-stats-bars"></i><span class="px-nav-label">Administration</span></a>

        <ul class="px-nav-dropdown-menu">
          <li class="px-nav-item"><a href="charts-flot.html"><span class="px-nav-label">Flot.js</span></a></li>
          <li class="px-nav-item"><a href="charts-morris.html"><span class="px-nav-label">Morris.js</span></a></li>
          <li class="px-nav-item"><a href="charts-chart.html"><span class="px-nav-label">Chart.js</span></a></li>
          <li class="px-nav-item"><a href="charts-chartist.html"><span class="px-nav-label">Chartist</span></a></li>
          <li class="px-nav-item"><a href="charts-c3.html"><span class="px-nav-label">C3.js</span></a></li>
          <li class="px-nav-item"><a href="charts-sparkline.html"><span class="px-nav-label">Sparkline</span></a></li>
          <li class="px-nav-item"><a href="charts-easy-pie-chart.html"><span class="px-nav-label">Easy Pie Chart</span></a></li>
        </ul>
      </li>
	  
	        <li class="px-nav-item px-nav-dropdown">
        <a href="#"><i class="px-nav-icon ion-stats-bars"></i><span class="px-nav-label">Reports</span></a>

        <ul class="px-nav-dropdown-menu">
          <li class="px-nav-item"><a href="charts-flot.html"><span class="px-nav-label">Flot.js</span></a></li>
          <li class="px-nav-item"><a href="charts-morris.html"><span class="px-nav-label">Morris.js</span></a></li>
          <li class="px-nav-item"><a href="charts-chart.html"><span class="px-nav-label">Chart.js</span></a></li>
          <li class="px-nav-item"><a href="charts-chartist.html"><span class="px-nav-label">Chartist</span></a></li>
          <li class="px-nav-item"><a href="charts-c3.html"><span class="px-nav-label">C3.js</span></a></li>
          <li class="px-nav-item"><a href="charts-sparkline.html"><span class="px-nav-label">Sparkline</span></a></li>
          <li class="px-nav-item"><a href="charts-easy-pie-chart.html"><span class="px-nav-label">Easy Pie Chart</span></a></li>
        </ul>
      </li>
	  
      <li class="px-nav-item px-nav-dropdown">
        <a href="#"><i class="px-nav-icon ion-stats-bars"></i><span class="px-nav-label">Settings</span></a>

        <ul class="px-nav-dropdown-menu">
          <li class="px-nav-item"><a href="charts-flot.html"><span class="px-nav-label">Financial Year</span></a></li>
          <li class="px-nav-item"><a href="charts-morris.html"><span class="px-nav-label">Account Setup</span></a></li>
          <li class="px-nav-item"><a href="charts-chart.html"><span class="px-nav-label">GST Setting</span></a></li>
          <li class="px-nav-item"><a href="charts-chartist.html"><span class="px-nav-label">Bank Master</span></a></li>
          <li class="px-nav-item"><a href="charts-c3.html"><span class="px-nav-label">Auditor Info</span></a></li>
          <li class="px-nav-item"><a href="charts-easy-pie-chart.html"><span class="px-nav-label">Year Ending Closing</span></a></li>
        </ul>
      </li>
	  
	       <li class="px-nav-item px-nav-dropdown">
        <a href="#"><i class="px-nav-icon ion-stats-bars"></i><span class="px-nav-label">Users Control</span></a>

        <ul class="px-nav-dropdown-menu">
          <li class="px-nav-item"><a href="charts-flot.html"><span class="px-nav-label">Users</span></a></li>
          <li class="px-nav-item"><a href="charts-morris.html"><span class="px-nav-label">Role</span></a></li>
          <li class="px-nav-item"><a href="charts-chart.html"><span class="px-nav-label">Permission</span></a></li>
         
        </ul>
      </li>
	  
<li class="px-nav-item">
        <a href="../docs/index.html" target="_blank" class="bg-success text-white b-a-0"><i class="px-nav-icon ion-social-buffer"></i><span class="px-nav-label">Broadcast</span></a>
      </li>
    </ul>
  </nav>
 
  

  
    <!-- END Sidebar -->

  