<?php 
		error_reporting(0);
		session_start();
		if(!isset($_SESSION['pengguna']) && !isset($_SESSION['pass'])){//untuk mengecek  
		
 ?>
 <?php ?>

<html>
<head>
	<title>Inventory Spare Part Computer</title>
				<link href="bootstrap/css/index_backgrounds.css" rel="stylesheet" media="screen"/>
				<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen"/>
				<link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen"/>
				<link href="bootstrap/css/font-awesome.css" rel="stylesheet" media="screen"/>
				<link href="bootstrap/css/my_style.css" rel="stylesheet" media="screen"/>
				<link href="vendors/easypiechart/jquery.easy-pie-chart.css" rel="stylesheet" media="screen"/>
				<link href="assets/styles.css" rel="stylesheet" media="screen"/> 
				<!-- calendar css -->
				<link href="vendors/fullcalendar/fullcalendar.css" rel="stylesheet" media="screen">
				<!-- index css -->
				<link href="bootstrap/css/index.css" rel="stylesheet" media="screen"/>
				<!-- data table css -->
				<link href="assets/DT_bootstrap.css" rel="stylesheet" media="screen"/>
				<!-- notification  -->
				<link href="vendors/jGrowl/jquery.jgrowl.css" rel="stylesheet" media="screen"/>
				<!-- wysiwug  -->
				<link rel="stylesheet" type="text/css" href="admin/vendors/bootstrap-wysihtml5/src/bootstrap-wysihtml5.css"/>
		<script src="vendors/jquery-1.9.1.min.js"></script>
        <script src="vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>
								
</head>
<body id="login">
<div class="body">
	

		
			<div class="span6">
				<div class="title_index">
					<div class="row-fluid">
						<div class="span12"></div>
							  <div class="row-fluid">
										<div class="span10">
										<img class="index_logo" src="images/logo.png">
										</div>	
										<div class="span12">
											<div class="motto">
											<p>WELCOME&nbsp;&nbsp;TO:</p>
											<p>Inventory Spare Part Computer&nbsp;(ISPC)</p>												
											</div>											
										</div>							
							   </div>		   							
   					</div>	

		   			


    			</div>
    		</div>
    	

				<div class="span11">
					<div class="pull-right">
							<form id="login_form1" action="pages\data_login.php" class="form-signin" method="post">
							<h3 class="form-signin-heading">
								<i class="icon-lock"></i> Please Login
							</h3>
							<input type="text"      class="input-block-level"   id="pengguna" name="pengguna" placeholder="Username" required>
							<input type="password"  class="input-block-level"   id="pass" name="pass" placeholder="Password" required>
							
							<button data-placement="right" title="Click Here to Sign In" id="signin" name="login" class="btn btn-info" type="submit"><i class="icon-signin icon-large"></i> Sign in</button>
							

							<!--<script type="text/javascript">
							$(document).ready(function(){
							$('#signin').tooltip('show');
							$('#signin').tooltip('hide');
							});
							</script>-->

							</form>
					</div>
				</div>

		
	
</div>	

<!--<script>
		jQuery(document).ready(function(){
		jQuery("#login_form1").submit(function(e){
				e.preventDefault();
				var formData = jQuery(this).serialize();
					$.ajax({
					type: "POST",
					url: "data_login.php",
					data: formData,
					success: function(html){

					if(html=='true_admin')
					{
					$.jGrowl("Loading File Please Wait......", { sticky: true });
					$.jGrowl("Welcome to Technonlogy Resource Inventory System (T.R.S.)", { header: 'Access Granted' });
					var delay = 1000;
					setTimeout(function(){ window.location = 'admin/dashboard_home.php'  }, delay);  
					}



					else
					{
					$.jGrowl("Please Check your username and Password", { header: 'Login Failed' });
					}
				}
			});
		return false;
	});
	});
</script>-->

		
		
</body>


</html>
<?php 
	}else{

		header('location:pages\admin.php');
	} 
 ?>
