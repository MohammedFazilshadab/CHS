<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CHS | Login</title>
    <link href="<?=base_url('assets/css/bootstrap.min.css')?>" rel="stylesheet">
    <link href="<?=base_url('assets/font-awesome/css/font-awesome.css')?>" rel="stylesheet">
    <link href="<?=base_url('assets/css/animate.css')?>" rel="stylesheet">
    <link href="<?=base_url('assets/css/style.css')?>" rel="stylesheet">
	<link href="<?=base_url('assets/css/plugins/toastr/toastr.min.css')?>" rel="stylesheet">
	
	<!-- Toastr style -->
    <link href="<?=base_url('assets/css/plugins/ladda/ladda-themeless.min.css')?>" rel="stylesheet">
</head>
<body class="gray-bg">
    <div class="middle-box text-center loginscreen animated fadeInDown"  id="loader">
        <div>
            <div>
                <h1 class="logo-name"> <img src="<?=base_url('assets/img/logo2.png')?>"></h1>
            </div>
            <h3>Welcome to CHS</h3>            
            <!--p>Login in. To see it in action.</p-->
			<div class="alert alert-danger" style="display:none">
				
			</div>
            <form class="m-t" role="form" id="LoginForm">
                <div class="form-group">
                    <input type="email" class="form-control" placeholder="Username" name="Email" required="">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Password" name="Password" required="">
                </div>
                <button type="button" class="btn btn-primary block full-width m-b ladda-button ladda-button-demo" id="LoginSubmit">Login</button>

                <a href="#"><small>Forgot password?</small></a>
                <p class="text-muted text-center"><small>Do not have an account?</small></p>
                <a class="btn btn-sm btn-white btn-block" href="register.html">Create an account</a>
            </form>
            <p class="m-t"> <small>Four Rays Management Pvt. Ltd. © 2013 - 2018</small> </p>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="<?=base_url('assets/js/jquery-3.1.1.min.js')?>"></script>
    <script src="<?=base_url('assets/js/bootstrap.min.js')?>"></script>
	<!-- Toastr script -->
    <script src="<?=base_url('assets/js/plugins/toastr/toastr.min.js')?>"></script>
	
	<!-- Ladda -->
    <script src="<?=base_url('assets/js/plugins/ladda/spin.min.js')?>"></script>
    <script src="<?=base_url('assets/js/plugins/ladda/ladda.min.js')?>"></script>
    <script src="<?=base_url('assets/js/plugins/ladda/ladda.jquery.min.js')?>"></script>
	<script>
	$(document).ready(function (){
		$("#LoginSubmit").click(function() {
			$('.alert-danger').hide();
			var l = $( '.ladda-button-demo' ).ladda();
			l.ladda( 'start' );
			var data = $("#LoginForm").serialize();
			$.ajax({
				url: "<?=base_url("/AjaxController/AjaxMethod/Login")?>",
				data: data,
				type: "POST",
				dataType: 'JSON',
				success: function(response) {
					if (response.result.success) {
						window.location = response.result.redirect;
					} else {
						$('.alert-danger').show().text(response.result.Message);
						toastr.success(response.result.Message,'Login fail notification!');
						setTimeout(function(){ 
							$('.alert-danger').hide(); 
						}, 5000);
						
						setTimeout(function(){
							l.ladda('stop');
						},500);
					}
				}
			});
			return false;
		});
	});	
	</script>	
</body>
</html>
