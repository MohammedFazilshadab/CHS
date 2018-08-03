<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('template/header');

?>



  <!-- Custom styling -->
  <style>
    .page-signup-modal {
      position: relative;
      top: auto;
      right: auto;
      bottom: auto;
      left: auto;
      z-index: 1;
      display: block;
    }

    .page-signup-form-group { position: relative; }

    .page-signup-icon {
      position: absolute;
      line-height: 21px;
      width: 36px;
      border-color: rgba(0, 0, 0, .14);
      border-right-width: 1px;
      border-right-style: solid;
      left: 1px;
      top: 9px;
      text-align: center;
      font-size: 15px;
    }

    html[dir="rtl"] .page-signup-icon {
      border-right: 0;
      border-left-width: 1px;
      border-left-style: solid;
      left: auto;
      right: 1px;
    }

    html:not([dir="rtl"]) .page-signup-icon + .page-signup-form-control { padding-left: 50px; }
    html[dir="rtl"] .page-signup-icon + .page-signup-form-control { padding-right: 50px; }

    /* Margins */

    .page-signup-modal > .modal-dialog { margin: 30px 10px; }

    @media (min-width: 544px) {
      .page-signup-modal > .modal-dialog {
        width: 400px;
        margin: 60px auto;
      }
    }
  </style>
  <!-- / Custom styling -->
</head>
<body>
  <div class="page-signup-modal modal">
    <div class="modal-dialog">
      <div class="modal-content">

        <div class="text-xs-center bg-primary p-y-4">
          <a class="px-demo-brand px-demo-brand-lg" href="index.html"><span class="px-demo-logo bg-primary m-t-0"><span class="px-demo-logo-1"></span><span class="px-demo-logo-2"></span><span class="px-demo-logo-3"></span><span class="px-demo-logo-4"></span><span class="px-demo-logo-5"></span><span class="px-demo-logo-6"></span><span class="px-demo-logo-7"></span><span class="px-demo-logo-8"></span><span class="px-demo-logo-9"></span></span><span class="font-size-20 line-height-1">CHS Online</span></span></a>
          <div class="font-size-15 m-t-1 line-height-1">Create an Account</div>
        </div>

        <form action="index.html" class="p-a-4">
    
          <fieldset class="page-signup-form-group form-group form-group-lg">
            <div class="page-signup-icon text-muted"><i class="ion-information-circled"></i></div>
            <input type="text" class="page-signup-form-control form-control" placeholder="Full Name">
          </fieldset>

          <fieldset class="page-signup-form-group form-group form-group-lg">
            <div class="page-signup-icon text-muted"><i class="ion-at"></i></div>
            <input type="email" class="page-signup-form-control form-control" placeholder="Mobile No">
			          <small class="text-muted">Mobile no will be verified with an OTP.</small>

          </fieldset>
		  		  
		  
		  <fieldset class="page-signup-form-group form-group form-group-lg">
            <div class="page-signup-icon text-muted"><i class="ion-at"></i></div>          		  
                    <input type="email" id="sms_code" name="sms_code" class="page-signup-form-control form-control" placeholder="Enter OTP">
                    <div style="color:red;float: left;" id="timer_div">OTP will Expire in <span id="s_timer"></span></div>
                    <a type="button" name="resend" id="resend">Resend OTP</a>
				</fieldset>

          <fieldset class="page-signup-form-group form-group form-group-lg">
            <div class="page-signup-icon text-muted"><i class="ion-person"></i></div>
            <input type="text" class="page-signup-form-control form-control" placeholder="Email">
          </fieldset>

          <fieldset class="page-signup-form-group form-group form-group-lg">
            <div class="page-signup-icon text-muted"><i class="ion-asterisk"></i></div>
            <input type="password" class="page-signup-form-control form-control" placeholder="Password">
            <small class="text-muted">Minimum 8 characters</small>
          </fieldset>

	<label class="custom-control custom-checkbox"> 
		<input type="checkbox" class="custom-control-input"/>
		<span class="custom-control-indicator"></span>
		I agree to the <a href="https://chsonline.in/terms-of-services" onclick="window.open('https://chsonline.in/terms-of-services','newwindow', 'width=500, height=600,directories=no,titlebar=no,toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=no');
	return false;"> Term of Service</a>
	/ 
	<a href="https://chsonline.in/privacy-policy" onclick="window.open('https://chsonline.in/privacy-policy','newwindow', 'width=500, height=600,directories=no,titlebar=no,toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=no');
	return false;">Privacy Policy.</a>
	</label>               
             

          <button type="submit" class="btn btn-block btn-lg btn-primary m-t-3">Sign Up</button>
        </form>

      </div>

      <div class="text-xs-center m-t-2 font-weight-bold font-size-14 text-white" id="px-demo-signin-link">
        Already have an account? <a href="pages-signin-v1.html" class="text-white"><u>Create Account</u></a>
      </div>
	      <p class="m-t"> <small>Four Rays Management Pvt. Ltd. © 2013 - <?php echo date('Y'); ?></small> </p>
    </div>
  </div>


  <!-- jQuery -->
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/pixeladmin.min.js"></script>


</body>
</html>
